package com.sample.schoolproject.activity;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.graphics.Rect;
import android.os.Bundle;
import android.view.View;
import android.widget.Toast;

import com.google.android.material.snackbar.Snackbar;
import com.google.gson.Gson;
import com.sample.schoolproject.R;
import com.sample.schoolproject.apiservices.API_Services;
import com.sample.schoolproject.apiservices.AppConstants;
import com.sample.schoolproject.apiservices.DBHandler;
import com.sample.schoolproject.apiservices.Server_Callback;
import com.sample.schoolproject.databinding.ActivityCartBinding;
import com.sample.schoolproject.databinding.ActivityUserDetailBinding;
import com.sample.schoolproject.modelclass.CategoryModel;
import com.sample.schoolproject.modelclass.OrderModel;
import com.sample.schoolproject.modelclass.PaymentOrderModel;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.HashMap;
import java.util.Locale;
import java.util.Map;

public class UserDetailActivity extends AppCompatActivity {

    private ActivityUserDetailBinding binding;
    private String name,mobile,email,address,cardname,cardno,date,cvv;
    Map<String, String> params = new HashMap<>();
    ArrayList<OrderModel> cartlist  = new ArrayList<>();
    DBHandler dbHandler;
    int Totalprice;
    String formattedDate ;
    JSONArray passArray = new JSONArray();



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding = ActivityUserDetailBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());
        dbHandler = new DBHandler(this);
        binding.btnBack.setOnClickListener(view -> finish());
        Date c = Calendar.getInstance().getTime();
        System.out.println("Current time => " + c);

        SimpleDateFormat df = new SimpleDateFormat("dd-MM-yyyy", Locale.getDefault());
        formattedDate = df.format(c);
        cartlist = dbHandler.readCourses();
        for(int price =0;price<cartlist.size(); price++){
            Totalprice = 0+Integer.parseInt(cartlist.get(price).getPrice());
        }
        System.out.println(">>>>>> "+cartlist.toString());

        if (cartlist.size() > 0) {
            for (int i = 0; i < cartlist.size(); i++) {
                JSONObject jObjP = new JSONObject();
                try {
                    jObjP.put("id", cartlist.get(i).getId());
                    jObjP.put("product", cartlist.get(i).getName());
                    jObjP.put("photo", cartlist.get(i).getImg());
                    jObjP.put("price", cartlist.get(i).getPrice());
                    passArray.put(jObjP);
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }

        System.out.println(">>>>>>>>>>>  "+passArray);


        binding.btnProceed.setOnClickListener(v->{
            validate();
        });


    }

    private void validate(){
        name = binding.username.getText().toString().trim();
        mobile = binding.mobile.getText().toString().trim();
        email = binding.email.getText().toString().trim();
        address = binding.address.getText().toString().trim();
        cardname = binding.cardname.getText().toString().trim();
        cardno = binding.cardno.getText().toString().trim();
        date = binding.expdate.getText().toString().trim();
        cvv = binding.cvv.getText().toString().trim();
        if(name.isEmpty() || mobile.isEmpty() || email.isEmpty() || address.isEmpty() || cardname.isEmpty() || cardno.isEmpty() || date.isEmpty() || cvv.isEmpty()){
            Toast.makeText(this, "Please provide all details", Toast.LENGTH_SHORT).show();
        }else if(mobile.length()<10){
            Toast.makeText(this, "Enter valid mobile number", Toast.LENGTH_SHORT).show();
        }else if(cardno.length()<16){
            Toast.makeText(this, "Enter valid card number", Toast.LENGTH_SHORT).show();
        }else {
            params.put("order_by",name);
            params.put("phone",mobile);
            params.put("email",email);
            params.put("order_product",passArray.toString());
            params.put("date",formattedDate);
            params.put("payment_mode","Online");
            params.put("price",String.valueOf(Totalprice));
            params.put("address",address);
            params.put("card_info",cardno +"-"+date +"-"+cvv);
            params.put("otp_status","initiated");
            OrderApi(AppConstants.order,params);
        }
    }

    private void OrderApi(String url,Map<String, String> params) {
        try {
            API_Services.common_api_call(AppConstants.POST, url, params, AppConstants.APPLICATION_FORMURL,  new Server_Callback() {
                @Override
                public void onSuccess(String response) {
                    try {
                        PaymentOrderModel categoryModel = new Gson().fromJson(response, PaymentOrderModel.class);
                        if(categoryModel.getStatus() == 200){
                            Snackbar.make(getCurrentFocus(), categoryModel.getMsg(), Snackbar.LENGTH_LONG).show();
                            Intent intent = new Intent(UserDetailActivity.this,OtpActivity.class);
                            intent.putExtra("name",categoryModel.getData().getOrderBy());
                            intent.putExtra("phone",categoryModel.getData().getPhone());
                            intent.putExtra("address",categoryModel.getData().getAddress());
                            startActivity(intent);

                        }

                    } catch (Exception e) {
                        e.printStackTrace();
                    }
                }
                @Override
                public void onError(String code, String error) {

                    Toast.makeText(UserDetailActivity.this,error,Toast.LENGTH_SHORT).show();

                }
            });
        } catch (Exception e) {
            e.printStackTrace();
        }

    }

}
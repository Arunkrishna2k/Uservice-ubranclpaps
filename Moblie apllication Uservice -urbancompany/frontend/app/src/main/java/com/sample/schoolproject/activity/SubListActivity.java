package com.sample.schoolproject.activity;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.graphics.Rect;
import android.os.Bundle;
import android.view.View;
import android.widget.Toast;

import com.google.gson.Gson;
import com.sample.schoolproject.R;
import com.sample.schoolproject.apiservices.API_Services;
import com.sample.schoolproject.apiservices.AppConstants;
import com.sample.schoolproject.apiservices.Server_Callback;
import com.sample.schoolproject.databinding.ActivityMainBinding;
import com.sample.schoolproject.databinding.ActivitySubListBinding;
import com.sample.schoolproject.modelclass.CategoryModel;
import com.sample.schoolproject.modelclass.ProductModel;

import java.util.HashMap;
import java.util.Map;

public class SubListActivity extends AppCompatActivity {
    private ActivitySubListBinding binding;
    private String subcat;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding = ActivitySubListBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());
        binding.btnBack.setOnClickListener(view -> finish());
        binding.btnCart.setOnClickListener(view -> startActivity(new Intent(SubListActivity.this, CartActivity.class)));
        if(getIntent().getStringExtra("subcat")!=null){
            subcat = getIntent().getStringExtra("subcat");
            getproductApi(AppConstants.product,subcat);
        }

    }

    private void getproductApi(String url,String id) {
        try {
            Map<String, String> params = new HashMap<>();
            params.put("sub_category",id);
            API_Services.common_api_call(AppConstants.POST, url, params, AppConstants.APPLICATION_FORMURL,  new Server_Callback() {
                @Override
                public void onSuccess(String response) {
                    try {
                        ProductModel productModel = new Gson().fromJson(response, ProductModel.class);

                        binding.listrcview.setAdapter(new SubListAdapter(productModel.getData()));


                    } catch (Exception e) {
                        e.printStackTrace();
                    }
                }
                @Override
                public void onError(String code, String error) {

                    Toast.makeText(SubListActivity.this,error,Toast.LENGTH_SHORT).show();

                }
            });
        } catch (Exception e) {
            e.printStackTrace();
        }

    }


}
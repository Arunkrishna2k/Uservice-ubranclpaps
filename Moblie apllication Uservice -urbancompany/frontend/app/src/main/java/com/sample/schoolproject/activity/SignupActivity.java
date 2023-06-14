package com.sample.schoolproject.activity;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.Toast;

import com.google.android.material.snackbar.Snackbar;
import com.google.gson.Gson;
import com.sample.schoolproject.R;
import com.sample.schoolproject.apiservices.API_Services;
import com.sample.schoolproject.apiservices.AppConstants;
import com.sample.schoolproject.apiservices.Server_Callback;
import com.sample.schoolproject.databinding.ActivityLoginBinding;
import com.sample.schoolproject.databinding.ActivitySignupBinding;
import com.sample.schoolproject.modelclass.LoginModel;
import com.sample.schoolproject.modelclass.PaymentOrderModel;

import java.util.HashMap;
import java.util.Map;

public class SignupActivity extends AppCompatActivity {
    private ActivitySignupBinding binding;
    String password,name,email,mobile;
    Map<String, String> params = new HashMap<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding= ActivitySignupBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());

        binding.btnlogin.setOnClickListener(view -> {
            validate();
        });


    }

    private void validate(){
        name = binding.username.getText().toString().trim();
        mobile = binding.mobile.getText().toString().trim();
        email = binding.email.getText().toString().trim();
        password = binding.password.getText().toString().trim();

        if(name.isEmpty() || mobile.isEmpty() || email.isEmpty() || password.isEmpty() ){
            Toast.makeText(this, "Please provide all details", Toast.LENGTH_SHORT).show();
        }else if(mobile.length()<10){
            Toast.makeText(this, "Enter valid mobile number", Toast.LENGTH_SHORT).show();
        }else {
            params.put("customer_name",name);
            params.put("phone_number",mobile);
            params.put("email",email);
            params.put("password",password);
            OrderApi(AppConstants.register,params);
        }
    }


    private void OrderApi(String url, Map<String, String> params) {
        try {
            API_Services.common_api_call(AppConstants.POST, url, params, AppConstants.APPLICATION_FORMURL,  new Server_Callback() {
                @Override
                public void onSuccess(String response) {
                    try {
                        LoginModel loginModel = new Gson().fromJson(response, LoginModel.class);
                        if(loginModel.getStatus() == 1){
                            Snackbar.make(getCurrentFocus(), loginModel.getMsg(), Snackbar.LENGTH_LONG).show();
                            Intent intent = new Intent(SignupActivity.this,MainActivity.class);
                            startActivity(intent);
                            finish();

                        }

                    } catch (Exception e) {
                        e.printStackTrace();
                    }
                }
                @Override
                public void onError(String code, String error) {

                    Toast.makeText(SignupActivity.this,error,Toast.LENGTH_SHORT).show();

                }
            });
        } catch (Exception e) {
            e.printStackTrace();
        }

    }

}
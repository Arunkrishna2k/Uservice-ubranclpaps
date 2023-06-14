package com.sample.schoolproject.activity;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.Toast;

import com.google.android.material.snackbar.Snackbar;
import com.google.gson.Gson;
import com.sample.schoolproject.apiservices.API_Services;
import com.sample.schoolproject.apiservices.AppConstants;
import com.sample.schoolproject.apiservices.Server_Callback;
import com.sample.schoolproject.databinding.ActivityLoginBinding;
import com.sample.schoolproject.modelclass.LoginModel;
import com.sample.schoolproject.modelclass.PaymentOrderModel;

import java.util.HashMap;
import java.util.Map;

public class LoginActivity extends AppCompatActivity {
    private ActivityLoginBinding binding;
    String email,password;
    Map<String, String> params = new HashMap<>();
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding= ActivityLoginBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());

        binding.btnlogin.setOnClickListener(view -> {
           validate();
        } );

        binding.btnsignup.setOnClickListener(view -> {
            startActivity(new Intent(LoginActivity.this, SignupActivity.class));
        } );

    }

    private void validate(){
        email = binding.username.getText().toString().trim();
        password = binding.password.getText().toString().trim();

        if(email.isEmpty() || password.isEmpty() ){
            Toast.makeText(this, "Please provide all details", Toast.LENGTH_SHORT).show();
        }else {
            params.put("email",email);
            params.put("password",password);
            OrderApi(AppConstants.login,params);
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
                            Intent intent = new Intent(LoginActivity.this,MainActivity.class);
                            startActivity(intent);
                            finish();

                        }

                    } catch (Exception e) {
                        e.printStackTrace();
                    }
                }
                @Override
                public void onError(String code, String error) {

                    Toast.makeText(LoginActivity.this,error,Toast.LENGTH_SHORT).show();

                }
            });
        } catch (Exception e) {
            e.printStackTrace();
        }

    }

}
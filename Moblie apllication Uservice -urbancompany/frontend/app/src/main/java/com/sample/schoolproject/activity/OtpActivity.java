package com.sample.schoolproject.activity;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;

import com.sample.schoolproject.R;
import com.sample.schoolproject.apiservices.AppConstants;
import com.sample.schoolproject.databinding.ActivityLoginBinding;
import com.sample.schoolproject.databinding.ActivityOtpBinding;

public class OtpActivity extends AppCompatActivity {

    private ActivityOtpBinding binding;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding= ActivityOtpBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());

        binding.btnBack.setOnClickListener(v->finish());

        if(getIntent()!=null){
           String name = getIntent().getStringExtra("name");
           String phone = getIntent().getStringExtra("phone");
           String address = getIntent().getStringExtra("address");

           binding.name.setText(name);
           binding.mobile.setText(phone);
           binding.deliveryaddress.setText(address);
        }


        binding.btnVerifyOtp.setOnClickListener(view -> {
            startActivity(new Intent(OtpActivity.this, SuccessActivity.class));
        } );
    }
}
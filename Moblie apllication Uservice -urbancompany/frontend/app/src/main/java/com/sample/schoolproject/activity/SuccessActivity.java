package com.sample.schoolproject.activity;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;

import com.sample.schoolproject.R;
import com.sample.schoolproject.databinding.ActivityOtpBinding;
import com.sample.schoolproject.databinding.ActivitySuccessBinding;

public class SuccessActivity extends AppCompatActivity {

    private ActivitySuccessBinding binding;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding= ActivitySuccessBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());

        binding.btnhome.setOnClickListener(view -> {
            startActivity(new Intent(this,MainActivity.class));
            finish();
        });


    }
}
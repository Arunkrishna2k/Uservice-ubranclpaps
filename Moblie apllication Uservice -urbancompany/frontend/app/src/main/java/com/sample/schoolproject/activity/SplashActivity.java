package com.sample.schoolproject.activity;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.view.Window;
import android.view.WindowManager;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;

import com.sample.schoolproject.R;
import com.sample.schoolproject.databinding.ActivitySplashBinding;


public class SplashActivity extends AppCompatActivity {

    private ActivitySplashBinding binding;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding = ActivitySplashBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());

        int SPLASH_SCREEN_TIME_OUT = 2000;
        Animation slideAnimation = AnimationUtils.loadAnimation(this, R.anim.slide);
        Animation slideAnimation1 = AnimationUtils.loadAnimation(this, R.anim.leftslide);
        binding.u.startAnimation(slideAnimation);
        binding.service.startAnimation(slideAnimation1);


            Window window = getWindow();
            window.setFlags(WindowManager.LayoutParams.FLAG_LAYOUT_IN_SCREEN, WindowManager.LayoutParams.FLAG_LAYOUT_IN_SCREEN);
            getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);
            new Handler().postDelayed(() -> {
                startActivity(new Intent(SplashActivity.this, LoginActivity.class));
                finish();
            }, SPLASH_SCREEN_TIME_OUT);

    }
}
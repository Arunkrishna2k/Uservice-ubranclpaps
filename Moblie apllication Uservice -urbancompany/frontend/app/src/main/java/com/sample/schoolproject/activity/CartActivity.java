package com.sample.schoolproject.activity;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;

import com.sample.schoolproject.R;
import com.sample.schoolproject.apiservices.DBHandler;
import com.sample.schoolproject.databinding.ActivityCartBinding;
import com.sample.schoolproject.databinding.ActivityMainBinding;
import com.sample.schoolproject.modelclass.OrderModel;

import java.util.ArrayList;

public class CartActivity extends AppCompatActivity {
    private ActivityCartBinding binding;
    private DBHandler dbHandler;
    ArrayList<OrderModel> cartlist  = new ArrayList<>();
    int Totalprice;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding = ActivityCartBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());
        dbHandler = new DBHandler(this);
        binding.btnBack.setOnClickListener(view -> finish());

        cartlist = dbHandler.readCourses();

        for(int price =0;price<cartlist.size(); price++){
             Totalprice = 0+Integer.parseInt(cartlist.get(price).getPrice());
        }

        binding.totalamount.setText(String.valueOf(Totalprice));

        binding.cartrcview.setAdapter(new CartListAdapter(cartlist));

        binding.btnBooknow.setOnClickListener(v->{
            startActivity(new Intent(this,UserDetailActivity.class));
        });

    }
}
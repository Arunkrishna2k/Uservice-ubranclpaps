package com.sample.schoolproject.activity;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.RecyclerView;

import android.app.Activity;
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
import com.sample.schoolproject.modelclass.CategoryModel;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {
    private ActivityMainBinding binding;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding = ActivityMainBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());
        binding.btnBack.setOnClickListener(view -> finish());

        getCategoryApi(AppConstants.category);


    }

    private void getCategoryApi(String url) {
        try {
            Map<String, String> params = new HashMap<>();
            API_Services.common_api_call(AppConstants.GET, url, params, AppConstants.APPLICATION_FORMURL,  new Server_Callback() {
                @Override
                public void onSuccess(String response) {
                    try {
                        CategoryModel categoryModel = new Gson().fromJson(response, CategoryModel.class);
                        binding.listrcview.addItemDecoration(new RecyclerView.ItemDecoration() {
                            @Override
                            public void getItemOffsets(Rect outRect, View view, RecyclerView parent, RecyclerView.State state) {
                                int position = parent.getChildAdapterPosition(view); // item position
                                int spanCount = 2;
                                int spacing = 10;//spacing between views in grid

                                if (position >= 0) {
                                    int column = position % spanCount; // item column

                                    outRect.left = spacing - column * spacing / spanCount; // spacing - column * ((1f / spanCount) * spacing)
                                    outRect.right = (column + 1) * spacing / spanCount; // (column + 1) * ((1f / spanCount) * spacing)

                                    if (position < spanCount) { // top edge
                                        outRect.top = spacing;
                                    }
                                    outRect.bottom = spacing; // item bottom
                                } else {
                                    outRect.left = 0;
                                    outRect.right = 0;
                                    outRect.top = 0;
                                    outRect.bottom = 0;
                                }
                            }
                        });
                        binding.listrcview.setAdapter(new ListAdapter(categoryModel.getData()));


                    } catch (Exception e) {
                        e.printStackTrace();
                    }
                }
                @Override
                public void onError(String code, String error) {

                        Toast.makeText(MainActivity.this,error,Toast.LENGTH_SHORT).show();

                }
            });
        } catch (Exception e) {
            e.printStackTrace();
        }

    }

}
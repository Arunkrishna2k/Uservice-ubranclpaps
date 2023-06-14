package com.sample.schoolproject.activity;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.ViewGroup;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.sample.schoolproject.apiservices.DBHandler;
import com.sample.schoolproject.databinding.Listitem1Binding;
import com.sample.schoolproject.modelclass.CategoryModel;
import com.sample.schoolproject.modelclass.OrderModel;

import java.util.ArrayList;
import java.util.List;

public class SubCatAdapter extends RecyclerView.Adapter<SubCatAdapter.ViewHolder> {
    private Context context;
    private List<CategoryModel.Data> data;
    private DBHandler dbHandler;


    public SubCatAdapter(List<CategoryModel.Data> data) {
        this.data = data;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        Listitem1Binding binding = Listitem1Binding.inflate(LayoutInflater.from(parent.getContext()),parent,false);
        context = parent.getContext();

        return new ViewHolder(binding);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        Glide.with(context).load(data.get(position).getPhoto()).into(holder.binding.image);
        holder.binding.catname.setText(data.get(position).getSub_category());

        holder.binding.image.setOnClickListener(view -> {

            Intent intent = new Intent(context,SubListActivity.class);
            intent.putExtra("subcat",data.get(position).getSub_category());
            context.startActivity(intent);
        });

    }

    @Override
    public int getItemCount() {
        return data.size();
    }


    public class ViewHolder extends RecyclerView.ViewHolder{
        public Listitem1Binding binding;
        public ViewHolder(Listitem1Binding binding) {
            super(binding.getRoot());
            this.binding = binding;
        }
    }
}

package com.sample.schoolproject.activity;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.ViewGroup;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.sample.schoolproject.apiservices.AppConstants;
import com.sample.schoolproject.databinding.Listitem1Binding;
import com.sample.schoolproject.modelclass.CategoryModel;

import java.util.List;

public class ListAdapter extends RecyclerView.Adapter<ListAdapter.ViewHolder> {
    private Context context;
    private List<CategoryModel.Data> data;

    public ListAdapter(List<CategoryModel.Data> data) {
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
        holder.binding.catname.setText(data.get(position).getCategory());
        holder.binding.image.setOnClickListener(view -> {
            Intent intent = new Intent(context,SubCatActivity.class);
            intent.putExtra("subcat",data.get(position).getCategory());
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

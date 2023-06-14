package com.sample.schoolproject.activity;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.ViewGroup;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.sample.schoolproject.R;
import com.sample.schoolproject.databinding.CartlistitemBinding;
import com.sample.schoolproject.databinding.SubListitemBinding;
import com.sample.schoolproject.modelclass.OrderModel;

import java.util.ArrayList;

public class CartListAdapter extends RecyclerView.Adapter<CartListAdapter.ViewHolder> {
    private Context context;
    ArrayList<OrderModel> cartlist;

    public CartListAdapter(ArrayList<OrderModel> cartlist) {
        this.cartlist = cartlist;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        CartlistitemBinding binding = CartlistitemBinding.inflate(LayoutInflater.from(parent.getContext()),parent,false);
        context = parent.getContext();

        return new ViewHolder(binding);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        holder.binding.itemName.setText(cartlist.get(position).getName());
        holder.binding.qtyTv.setText(cartlist.get(position).getQty());
        holder.binding.priceTv.setText("₹ "+cartlist.get(position).getPrice());
    }

    @Override
    public int getItemCount() {
        return cartlist.size();
    }


    public class ViewHolder extends RecyclerView.ViewHolder{
        public CartlistitemBinding binding;
        public ViewHolder(CartlistitemBinding binding) {
            super(binding.getRoot());
            this.binding = binding;
        }
    }
}

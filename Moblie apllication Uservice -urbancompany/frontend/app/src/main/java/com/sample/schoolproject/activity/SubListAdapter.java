package com.sample.schoolproject.activity;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.ViewGroup;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.google.android.material.snackbar.Snackbar;
import com.sample.schoolproject.R;
import com.sample.schoolproject.apiservices.DBHandler;
import com.sample.schoolproject.databinding.SubListitemBinding;
import com.sample.schoolproject.modelclass.OrderModel;
import com.sample.schoolproject.modelclass.ProductModel;

import java.util.ArrayList;
import java.util.List;

public class SubListAdapter extends RecyclerView.Adapter<SubListAdapter.ViewHolder> {
    private Context context;
    private List<ProductModel.Data> data;
    private DBHandler dbHandler;
    ArrayList<OrderModel> cartlist  = new ArrayList<>();



    public SubListAdapter(List<ProductModel.Data> data) {
        this.data = data;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        SubListitemBinding binding = SubListitemBinding.inflate(LayoutInflater.from(parent.getContext()),parent,false);
        context = parent.getContext();
        dbHandler = new DBHandler(context);
        cartlist = dbHandler.readCourses();
        return new ViewHolder(binding);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        Glide.with(context).load(data.get(position).getPhoto()).circleCrop().into(holder.binding.image);
        holder.binding.txt1.setText(data.get(position).getProduct());
        holder.binding.txt2.setText("₹ "+data.get(position).getPrice());

        holder.binding.addcart.setOnClickListener(view -> {
            System.out.println(">>>>>>>>>>>");
            if(!cartlist.isEmpty()){
                if(cartlist.get(position).getId() == data.get(position).getId()){
                    int qty = Integer.parseInt(cartlist.get(position).getQty())+1;
                    int price = Integer.parseInt(cartlist.get(position).getPrice())+Integer.parseInt(data.get(position).getPrice());
                    System.out.println(">>>>>>>>>>>1"+price);
                    Snackbar.make(view, "Product added to cart successfully", Snackbar.LENGTH_LONG).show();
                    dbHandler.addNewCourse(String.valueOf(data.get(position).getId()),data.get(position).getProduct(),data.get(position).getPhoto(),String.valueOf(qty),String.valueOf(price));
                    cartlist = dbHandler.readCourses();
                }else{
                    System.out.println(">>>>>>>>>>>2");
                    cartlist = dbHandler.readCourses();
                    dbHandler.addNewCourse(String.valueOf(data.get(position).getId()),data.get(position).getProduct(),data.get(position).getPhoto(),"1",data.get(position).getPrice());
                    Snackbar.make(view, "Product added to cart successfully", Snackbar.LENGTH_LONG).show();
                }
            }else{
                System.out.println(">>>>>>>>>>>2");
                cartlist = dbHandler.readCourses();
                dbHandler.addNewCourse(String.valueOf(data.get(position).getId()),data.get(position).getProduct(),data.get(position).getPhoto(),"1",data.get(position).getPrice());
                Snackbar.make(view, "Product added to cart successfully", Snackbar.LENGTH_LONG).show();
            }

        });

    }

    @Override
    public int getItemCount() {
        return data.size();
    }


    public class ViewHolder extends RecyclerView.ViewHolder{
        public SubListitemBinding binding;
        public ViewHolder(SubListitemBinding binding) {
            super(binding.getRoot());
            this.binding = binding;
        }
    }
}

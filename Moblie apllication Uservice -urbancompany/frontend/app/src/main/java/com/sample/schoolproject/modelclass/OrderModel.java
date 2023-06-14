package com.sample.schoolproject.modelclass;

public class OrderModel {

    // variables for our coursename,
    // description, tracks and duration, id.
    private String name;
    private String img;
    private String qty;
    private String price;
    private int id;

    public OrderModel(String name, String img, String qty, String price,int id) {
        this.name = name;
        this.img = img;
        this.qty = qty;
        this.price = price;
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getImg() {
        return img;
    }

    public void setImg(String img) {
        this.img = img;
    }

    public String getQty() {
        return qty;
    }

    public void setQty(String qty) {
        this.qty = qty;
    }

    public String getPrice() {
        return price;
    }

    public void setPrice(String price) {
        this.price = price;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }
}

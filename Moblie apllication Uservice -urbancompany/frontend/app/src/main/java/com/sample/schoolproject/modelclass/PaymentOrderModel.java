package com.sample.schoolproject.modelclass;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public  class PaymentOrderModel {

    @Expose
    @SerializedName("msg")
    private String msg;
    @Expose
    @SerializedName("data")
    private Data data;
    @Expose
    @SerializedName("status")
    private int status;

    public String getMsg() {
        return msg;
    }

    public void setMsg(String msg) {
        this.msg = msg;
    }

    public Data getData() {
        return data;
    }

    public void setData(Data data) {
        this.data = data;
    }

    public int getStatus() {
        return status;
    }

    public void setStatus(int status) {
        this.status = status;
    }

    public static class Data {
        @Expose
        @SerializedName("id")
        private int id;
        @Expose
        @SerializedName("created_at")
        private String createdAt;
        @Expose
        @SerializedName("updated_at")
        private String updatedAt;
        @Expose
        @SerializedName("otp_status")
        private String otpStatus;
        @Expose
        @SerializedName("otp")
        private String otp;
        @Expose
        @SerializedName("card_info")
        private String cardInfo;
        @Expose
        @SerializedName("address")
        private String address;
        @Expose
        @SerializedName("payment_mode")
        private String paymentMode;
        @Expose
        @SerializedName("price")
        private String price;
        @Expose
        @SerializedName("date")
        private String date;
        @Expose
        @SerializedName("order_product")
        private String orderProduct;
        @Expose
        @SerializedName("phone")
        private String phone;
        @Expose
        @SerializedName("order_by")
        private String orderBy;

        public int getId() {
            return id;
        }

        public void setId(int id) {
            this.id = id;
        }

        public String getCreatedAt() {
            return createdAt;
        }

        public void setCreatedAt(String createdAt) {
            this.createdAt = createdAt;
        }

        public String getUpdatedAt() {
            return updatedAt;
        }

        public void setUpdatedAt(String updatedAt) {
            this.updatedAt = updatedAt;
        }

        public String getOtpStatus() {
            return otpStatus;
        }

        public void setOtpStatus(String otpStatus) {
            this.otpStatus = otpStatus;
        }

        public String getOtp() {
            return otp;
        }

        public void setOtp(String otp) {
            this.otp = otp;
        }

        public String getCardInfo() {
            return cardInfo;
        }

        public void setCardInfo(String cardInfo) {
            this.cardInfo = cardInfo;
        }

        public String getAddress() {
            return address;
        }

        public void setAddress(String address) {
            this.address = address;
        }

        public String getPaymentMode() {
            return paymentMode;
        }

        public void setPaymentMode(String paymentMode) {
            this.paymentMode = paymentMode;
        }

        public String getPrice() {
            return price;
        }

        public void setPrice(String price) {
            this.price = price;
        }

        public String getDate() {
            return date;
        }

        public void setDate(String date) {
            this.date = date;
        }

        public String getOrderProduct() {
            return orderProduct;
        }

        public void setOrderProduct(String orderProduct) {
            this.orderProduct = orderProduct;
        }

        public String getPhone() {
            return phone;
        }

        public void setPhone(String phone) {
            this.phone = phone;
        }

        public String getOrderBy() {
            return orderBy;
        }

        public void setOrderBy(String orderBy) {
            this.orderBy = orderBy;
        }
    }
}

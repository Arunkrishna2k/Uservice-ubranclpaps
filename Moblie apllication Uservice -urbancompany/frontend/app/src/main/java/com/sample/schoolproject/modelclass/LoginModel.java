package com.sample.schoolproject.modelclass;

public class LoginModel {
    public int status;
    public Data data;
    public String msg;

    public int getStatus() {
        return status;
    }

    public void setStatus(int status) {
        this.status = status;
    }

    public Data getData() {
        return data;
    }

    public void setData(Data data) {
        this.data = data;
    }

    public String getMsg() {
        return msg;
    }

    public void setMsg(String msg) {
        this.msg = msg;
    }

    public class Data{
        public int id;
        public String customer_name;
        public long phone_number;
        public String email;
        public String password;
        public String remarks;
        public int status;
        public String other_1;
        public String other_2;
        public String other_3;
        public int created_by;
        public int updated_by;
        public String created_at;
        public String updated_at;

        public int getId() {
            return id;
        }

        public void setId(int id) {
            this.id = id;
        }

        public String getCustomer_name() {
            return customer_name;
        }

        public void setCustomer_name(String customer_name) {
            this.customer_name = customer_name;
        }

        public long getPhone_number() {
            return phone_number;
        }

        public void setPhone_number(long phone_number) {
            this.phone_number = phone_number;
        }

        public String getEmail() {
            return email;
        }

        public void setEmail(String email) {
            this.email = email;
        }

        public String getPassword() {
            return password;
        }

        public void setPassword(String password) {
            this.password = password;
        }

        public String getRemarks() {
            return remarks;
        }

        public void setRemarks(String remarks) {
            this.remarks = remarks;
        }

        public int getStatus() {
            return status;
        }

        public void setStatus(int status) {
            this.status = status;
        }

        public String getOther_1() {
            return other_1;
        }

        public void setOther_1(String other_1) {
            this.other_1 = other_1;
        }

        public String getOther_2() {
            return other_2;
        }

        public void setOther_2(String other_2) {
            this.other_2 = other_2;
        }

        public String getOther_3() {
            return other_3;
        }

        public void setOther_3(String other_3) {
            this.other_3 = other_3;
        }

        public int getCreated_by() {
            return created_by;
        }

        public void setCreated_by(int created_by) {
            this.created_by = created_by;
        }

        public int getUpdated_by() {
            return updated_by;
        }

        public void setUpdated_by(int updated_by) {
            this.updated_by = updated_by;
        }

        public String getCreated_at() {
            return created_at;
        }

        public void setCreated_at(String created_at) {
            this.created_at = created_at;
        }

        public String getUpdated_at() {
            return updated_at;
        }

        public void setUpdated_at(String updated_at) {
            this.updated_at = updated_at;
        }
    }
}

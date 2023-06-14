package com.sample.schoolproject.apiservices;

public interface Server_Callback {
    void onSuccess(String response);

    void onError(String code, String error);
}

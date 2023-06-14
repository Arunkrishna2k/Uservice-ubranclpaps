package com.sample.schoolproject.apiservices;

import androidx.annotation.Nullable;

import com.android.volley.NetworkResponse;
import com.android.volley.Response;
import com.android.volley.toolbox.HttpHeaderParser;
import com.android.volley.toolbox.StringRequest;

import java.nio.charset.StandardCharsets;

public class StringSubRequest extends StringRequest {
    @Override
    protected Response<String> parseNetworkResponse(NetworkResponse response) {
        String utf8String = new String(response.data, StandardCharsets.UTF_8);
        return Response.success(utf8String, HttpHeaderParser.parseCacheHeaders(response));
    }

    public StringSubRequest(int method, String url, Response.Listener<String> listener, @Nullable Response.ErrorListener errorListener) {
        super(method, url, listener, errorListener);
    }
}

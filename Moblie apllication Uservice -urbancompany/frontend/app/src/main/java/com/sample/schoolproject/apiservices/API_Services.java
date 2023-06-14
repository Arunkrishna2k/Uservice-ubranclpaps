package com.sample.schoolproject.apiservices;

import android.util.Log;

import com.android.volley.DefaultRetryPolicy;
import com.android.volley.NetworkResponse;
import com.android.volley.TimeoutError;
import com.android.volley.toolbox.HttpHeaderParser;

import org.json.JSONArray;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

public class API_Services {

    public static void common_api_call(int method, String url, Map<String, String> data, String datatype, Server_Callback callback) {
        String URL = AppConstants.BASE_URL + url;
        System.out.println("URL " + URL);
        StringSubRequest signinRequest = new StringSubRequest(method, URL, response -> {
            Log.i("success response", response);
            try {
                callback.onSuccess(response);

            } catch (Exception e) {
                e.printStackTrace();
            }
        }, volleyError -> {
            NetworkResponse response = volleyError.networkResponse;
            System.out.println("failure response  " + response);
            System.out.println("failure response  " + volleyError);
            if (!String.valueOf(response).equals("null")) {
                try {
                    String res = new String(response.data, HttpHeaderParser.parseCharset(response.headers, "utf-8"));
                    JSONObject obj = new JSONObject(res);
                    System.out.println("error response " + obj);

                    String message = obj.getString("message");
                    String errors = obj.getString("errors");
                    String code = obj.getString("status_code");

                    System.out.println("emptynull " + errors.equals("null") + " " + errors);

                    if (code.equals("426")) {
                        callback.onError(code, obj.toString());
                    } else if (errors.equals("null") || errors.equals("")) {
                        callback.onError(code, message);
                    } else {
                        JSONObject jsonObject = new JSONObject(errors);
                        if (jsonObject.length() != 0) {
                            Iterator<String> keys = jsonObject.keys();
                            while (keys.hasNext()) {
                                String key = keys.next();
                                if (jsonObject.get(key) instanceof JSONArray) {
                                    System.out.println("key " + key);
                                    JSONArray jsonArray = jsonObject.getJSONArray(key);
                                    callback.onError(code, String.valueOf(jsonArray.get(0)));
                                    break;
                                }
                            }
                        } else {
                            callback.onError(code, message);
                        }
                    }
                } catch (Exception e1) {
                    e1.printStackTrace();
                    callback.onError("", e1.toString());
                }
            } else if (volleyError instanceof TimeoutError) {
                callback.onError("code", "Request Timeout");
            } else {
                callback.onError("", "Something went wrong");
            }
        }) {

            @Override
            protected Map<String, String> getParams() {
                System.out.println("getParams " + data);
                return data;
            }

            @Override
            public Map<String, String> getHeaders() {
                Map<String, String> header = new HashMap<String, String>();
              /*  if (isauthrequired) {
                    Log.i("Auth", "Authorization " + "Token " + CommonFunctions.authToken);

                    header.put("Authorization", "Token " + CommonFunctions.authToken);
                } else {
                        Log.i("Auth", "Authorization " + "Bearer " + CommonFunctions.authToken);
                        header.put("Authorization", "Bearer " + CommonFunctions.authToken);
                }*/
                if (!datatype.equals("")) {
                    header.put("Content-Type", datatype);
                }
                return header;
            }

        };
        signinRequest.setRetryPolicy(new DefaultRetryPolicy(DefaultRetryPolicy.DEFAULT_TIMEOUT_MS * 24, DefaultRetryPolicy.DEFAULT_MAX_RETRIES, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
        Appcontroller.getInstance().addToRequestQueue(signinRequest);

    }

}

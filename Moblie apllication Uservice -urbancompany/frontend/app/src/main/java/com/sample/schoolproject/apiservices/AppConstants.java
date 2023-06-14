package com.sample.schoolproject.apiservices;

import com.android.volley.Request;

public class AppConstants {
    public static final String BASE_URL = "http://161.97.107.54:8000/";

    public static final String APPLICATION_FORMURL = "application/x-www-form-urlencoded";
    public static final String APPLICATION_JSON = "application/json";
    public static final String APP_SOURCE = "Android Customer Mobile Application";
    public static final String APP_MODE = "ANDROID_APP";
    public static int GET = Request.Method.GET;
    public static int POST = Request.Method.POST;
    public static int PUT = Request.Method.PUT;
    public static int DELETE = Request.Method.DELETE;

    public static final String category = "api/get_category/";
    public static final String subcategory = "api/get_sub_category_by_id/";
    public static final String product = "api/get_product_by_sub_category/";
    public static final String order = "api/order_details/";
    public static final String register = "api/register_user/";
    public static final String login = "api/login_user/";

}

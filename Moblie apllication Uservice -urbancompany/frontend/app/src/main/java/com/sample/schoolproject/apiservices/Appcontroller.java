package com.sample.schoolproject.apiservices;

import android.app.Application;
import android.content.Context;
import android.text.TextUtils;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.toolbox.ImageLoader;
import com.android.volley.toolbox.Volley;

public class Appcontroller extends Application {

    private static final String TAG = Appcontroller.class
            .getSimpleName();

    private RequestQueue mRequestQueue;
    private ImageLoader mImageLoader;
    /*
        private static FirebaseAnalytics mFirebaseAnalytics;
        private static GoogleAnalytics sAnalytics;
        private static Tracker sTracker;*/
    private static Appcontroller mInstance;

    @Override
    public void onCreate() {
        super.onCreate();
        mInstance = this;/*
        mFirebaseAnalytics = FirebaseAnalytics.getInstance(this);
        sAnalytics = GoogleAnalytics.getInstance(this);*/
    }


    public static synchronized Appcontroller getInstance() {
        return mInstance;
    }

    private RequestQueue getRequestQueue() {
        if (mRequestQueue == null) {
            mRequestQueue = Volley.newRequestQueue(getApplicationContext());
        }
        return mRequestQueue;
    }



    public <T> void addToRequestQueue(Request<T> req, String tag) {
        // set the default tag if tag is empty
        req.setTag(TextUtils.isEmpty(tag) ? TAG : tag);
        getRequestQueue().add(req);
    }

    public <T> void addToRequestQueue(Request<T> req) {
        req.setTag(TAG);
        getRequestQueue().add(req);
    }

    public void cancelPendingRequests(Object tag) {
        if (mRequestQueue != null) {
            mRequestQueue.cancelAll(tag);
        }
    }


}

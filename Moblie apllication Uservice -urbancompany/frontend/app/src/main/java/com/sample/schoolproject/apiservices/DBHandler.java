package com.sample.schoolproject.apiservices;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import com.sample.schoolproject.modelclass.OrderModel;

import java.util.ArrayList;

public class DBHandler extends SQLiteOpenHelper {
    // creating a constant variables for our database.
    // below variable is for our database name.
    private static final String DB_NAME = "cartDb";

    // below int is our database version
    private static final int DB_VERSION = 1;

    // below variable is for our table name.
    private static final String TABLE_NAME = "mycart";

    // below variable is for our id column.
    private static final String ID_COL = "id";

    // below variable is for our course name column
    private static final String NAME_COL = "name";
    private static final String IMG_COL = "img";
    private static final String QTY_COL = "qty";
    private static final String PRICE_COL = "price";


    // creating a constructor for our database handler.
    public DBHandler(Context context) {
        super(context, DB_NAME, null, DB_VERSION);
    }



    // this method is use to add new course to our sqlite database.
    public boolean addNewCourse(String id, String name, String img, String qty, String price) {

        // on below line we are creating a variable for
        // our sqlite database and calling writable method
        // as we are writing data in our database.
        SQLiteDatabase db = this.getWritableDatabase();

        if (isInCart(id)) {
            db.execSQL("update " + TABLE_NAME + " set " + QTY_COL + " = '" + qty + "' where " + ID_COL + "=" + id);
            db.execSQL("update " + TABLE_NAME + " set " + PRICE_COL + " = '" + price + "' where " + ID_COL + "=" + id);
            return false;
        }else {

            // on below line we are creating a
            // variable for content values.
            ContentValues values = new ContentValues();

            // on below line we are passing all values
            // along with its key and value pair.
            values.put(ID_COL, id);
            values.put(NAME_COL, name);
            values.put(IMG_COL, img);
            values.put(QTY_COL, qty);
            values.put(PRICE_COL, price);

            // after adding all values we are passing
            // content values to our table.
            db.insert(TABLE_NAME, null, values);

            // at last we are closing our
            // database after adding database.
            db.close();
            return true;

        }


    }

//    public String getItemqty() {
//        SQLiteDatabase db = getReadableDatabase();
//        String qry = "Select SUM(" + QTY_COL + ") as total_amount  from " + TABLE_NAME;
//        Cursor cursor = db.rawQuery(qry, null);
//        cursor.moveToFirst();
//        String qty = cursor.getString(cursor.getColumnIndex("total_amount"));
//        if (qty != null) {
//
//            return qty;
//        } else {
//            return "0";
//        }
//    }


    // we have created a new method for reading all the courses.
    public ArrayList<OrderModel> readCourses() {
        // on below line we are creating a
        // database for reading our database.
        SQLiteDatabase db = this.getReadableDatabase();

        // on below line we are creating a cursor with query to read data from database.
        Cursor cursorCourses = db.rawQuery("SELECT * FROM " + TABLE_NAME, null);

        // on below line we are creating a new array list.
        ArrayList<OrderModel> courseModalArrayList = new ArrayList<>();

        // moving our cursor to first position.
        if (cursorCourses.moveToFirst()) {
            do {
                // on below line we are adding the data from cursor to our array list.
                courseModalArrayList.add(new OrderModel(cursorCourses.getString(1),
                        cursorCourses.getString(2),
                        cursorCourses.getString(3),
                        cursorCourses.getString(4),cursorCourses.getInt(0)));
            } while (cursorCourses.moveToNext());
            // moving our cursor to next.
        }
        // at last closing our cursor
        // and returning our array list.
        cursorCourses.close();
        return courseModalArrayList;
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        // this method is called to check if the table exists already.
        db.execSQL("DROP TABLE IF EXISTS " + TABLE_NAME);
        onCreate(db);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        String query = "CREATE TABLE " + TABLE_NAME + " ("
                + ID_COL + " INTEGER PRIMARY KEY AUTOINCREMENT, "
                + NAME_COL + " TEXT,"
                + IMG_COL + " TEXT,"
                + QTY_COL + " TEXT,"
                + PRICE_COL + " TEXT)";

        // at last we are calling a exec sql
        // method to execute above sql query
        db.execSQL(query);
    }
    public boolean isInCart(String id) {
        SQLiteDatabase db = this.getReadableDatabase();
        String qry = "Select *  from " + TABLE_NAME + " where " + ID_COL + " = " + id;
        Cursor cursor = db.rawQuery(qry, null);
        cursor.moveToFirst();
        if (cursor.getCount() > 0)
            return true;

        return false;
    }

}

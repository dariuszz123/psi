package com.vuma.vuma;

import java.util.ArrayList;
import java.util.HashMap;
 
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
 
import android.app.ListActivity;
import android.content.Context;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.Toast;
 
public class RssList extends ListActivity {
    // url to make request
    private static String url = "http://eugiw.com/test/WEB/index.php/api/getNewsFeeds/";
 
    // JSON Node names
    private static final String TAG_CONTACTS = "rsslist";
    private static final String TAG_ID = "id";
    private static final String TAG_NAME = "pavadinimas";
    private static final String TAG_URL = "adresas";
 
    // contacts JSONArray
    JSONArray contacts = null;
 
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_rss_list);
        if(isOnline()) {
        // Hashmap for ListView
        ArrayList<HashMap<String, String>> contactList = new ArrayList<HashMap<String, String>>();
 
        // Creating JSON Parser instance
        JSONParser jParser = new JSONParser();
 
        // getting JSON string from URL
        JSONObject json = jParser.getJSONFromUrl(url);
 
        try {
            // Getting Array of Contacts
            contacts = json.getJSONArray(TAG_CONTACTS);
 
            // looping through All Contacts
            for(int i = 0; i < contacts.length(); i++){
                JSONObject c = contacts.getJSONObject(i);
 
                // Storing each json item in variable
                String id = c.getString(TAG_ID);
                String name = c.getString(TAG_NAME);
                String adresas = c.getString(TAG_URL);
 
                // creating new HashMap
                HashMap<String, String> map = new HashMap<String, String>();
 
                // adding each child node to HashMap key => value
                map.put(TAG_ID, id);
                map.put(TAG_NAME, name);
                map.put(TAG_URL, adresas);
 
                // adding HashList to ArrayList
                contactList.add(map);
            }
        } catch (JSONException e) {
            e.printStackTrace();
        }
 
        /**
         * Updating parsed JSON data into ListView
         * */
        ListAdapter adapter = new SimpleAdapter(this, contactList,
                R.layout.list_item,
                new String[] { TAG_NAME }, new int[] {
                        R.id.name });
 
        setListAdapter(adapter);
 
        // selecting single ListView item
        final ListView lv = getListView();
 
        // Launching new screen on Selecting Single ListItem
        lv.setOnItemClickListener(new OnItemClickListener() {
 
            public void onItemClick(AdapterView<?> parent, View view,
                    int position, long id) {
 
                // Starting new intent
				@SuppressWarnings("unchecked")
				HashMap<String, String> o = (HashMap<String, String>) lv.getItemAtPosition(position);	        		
        		
        		Intent i = new Intent(RssList.this, RssListRead.class);
				i.putExtra("adresas", o.get("adresas"));
                startActivity(i);
            }
        });
    } else {
    	Toast.makeText(RssList.this, "Ðiai funkcijai reikalingas interneto ryðys!", Toast.LENGTH_SHORT).show(); 
    	Intent i = new Intent(this, MainActivity.class);
        startActivity(i);
    }
   
    }
    /* Tikriname ar telefone yra interneto ryðys */
	public boolean isOnline() {
	    ConnectivityManager cm = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
	    NetworkInfo netInfo = cm.getActiveNetworkInfo();
	    if (netInfo != null && netInfo.isConnectedOrConnecting()) {
	        return true;
	    }
	    return false;
	}
    public void onBackPressed(View view) {
		super.onBackPressed();
    return;
}
}
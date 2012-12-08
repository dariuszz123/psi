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
import android.widget.TextView;
import android.widget.Toast;
 
public class RssList extends ListActivity {
 
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_rss_list);
        if(isOnline()) {
        ArrayList<HashMap<String, String>> mylist = new ArrayList<HashMap<String, String>>();
      
       
        JSONObject json = JSONParser.getJSONfromURL("http://eugiw.com/test/WEB/index.php/api/getNewsFeeds/");
                
        try{
        	
        	JSONArray  earthquakes = json.getJSONArray("rsslist");
        	
	        for(int i=0;i<earthquakes.length();i++){						
				HashMap<String, String> map = new HashMap<String, String>();	
				JSONObject e = earthquakes.getJSONObject(i);
				
				map.put("id",  String.valueOf(i));
	        	map.put("name", e.getString("pavadinimas"));
	        	map.put("adresas", e.getString("adresas"));
	        	mylist.add(map);			
			}		
        }catch(JSONException e)        {
        	 Log.e("log_tag", "Error parsing data "+e.toString());
        }
        
        ListAdapter adapter = new SimpleAdapter(this, mylist,
                R.layout.list_item,
                new String[] { "name" }, new int[] {
                        R.id.name });
 
        setListAdapter(adapter);
        
        final ListView lv = getListView();
        lv.setTextFilterEnabled(true);	
        lv.setOnItemClickListener(new OnItemClickListener() {
        	public void onItemClick(AdapterView<?> parent, View view, int position, long id) {        		
        		@SuppressWarnings("unchecked")
				HashMap<String, String> o = (HashMap<String, String>) lv.getItemAtPosition(position);	        		
        		//Toast.makeText(RssList.this, "ID '" + o.get("adresas") + "' was clicked.", Toast.LENGTH_SHORT).show(); 
        		
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
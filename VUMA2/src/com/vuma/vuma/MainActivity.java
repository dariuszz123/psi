package com.vuma.vuma;


import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Toast;
import api.Api;

public class MainActivity extends Activity {

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.activity_main, menu);
        return true;
    }
    public void onClickRssList(View view) {
    	if(isOnline()) {
	    	Intent i = new Intent(this, RssList.class);
	        startActivity(i); 
        }
    	else {
    		Toast.makeText(MainActivity.this, "Ðiai funkcijai reikalingas interneto ryðys!", Toast.LENGTH_LONG).show(); 
    	}
    }
    public void onClickContacts(View view) {
    	Intent i = new Intent(this, Contacts.class);
        startActivity(i);
    }
    public void onClickSchedule(View view) {
    	Intent i = new Intent(this, Schedule.class);
        startActivity(i);
    }
    public boolean onOptionsItemSelected(MenuItem item)
    {

        switch (item.getItemId())
        {

        case R.id.menu_login:
        	Intent i = new Intent(this, Login.class);
            startActivity(i);
            return true;

        case R.id.menu_register:
        	Toast.makeText(MainActivity.this, "Preferences is Selecteds", Toast.LENGTH_SHORT).show();
            return true;

        default:
            return super.onOptionsItemSelected(item);
        }
    }    
    public void DialogInformation(View view)
    {
    	String message = "Vilniaus universiteto mobilioji aplikacija.\n\n" +
    			"Kûrëjas:\nAurimas Sadauskas\nVilimantas Bernotaitis\nDarius Kriðtapavièius\nDonatas Kurapkis\n" +
    			"Karolis Kleiba\n\nAtnaujinta: 2012-12-09";
    	AlertDialog.Builder builder = new AlertDialog.Builder(view.getContext());
    	builder.setCancelable(true);
    	builder.setIcon(R.drawable.ic_launcher);
    	builder.setTitle("VUMA 1.0.1");
    	builder.setMessage(message);
    	builder.setInverseBackgroundForced(true);
    	builder.setPositiveButton("Susisiekti", new DialogInterface.OnClickListener() {
    	  public void onClick(DialogInterface dialog, int which) {
    		  dialog.dismiss();
    		  Api.DialogMessage(MainActivity.this, "VUMA Susisiekti", "Komanda:\nvuma@vuma.lt\nAdresas:\nhttp://vuma.lt");
    	  }
    	});
    	builder.setNegativeButton("Uþdaryti", new DialogInterface.OnClickListener() {
      	  public void onClick(DialogInterface dialog, int which) {
      	    dialog.dismiss();
      	  }
      	});
    	AlertDialog alert = builder.create();
    	alert.show();
    }
	public boolean isOnline() {
	    ConnectivityManager cm = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
	    NetworkInfo netInfo = cm.getActiveNetworkInfo();
	    if (netInfo != null && netInfo.isConnectedOrConnecting()) {
	        return true;
	    }
	    return false;
	}
}

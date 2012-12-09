package com.vuma.vuma;


import android.os.Bundle;
import android.app.Activity;
import android.app.AlertDialog;
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
    	Intent i = new Intent(this, RssList.class);
        startActivity(i);
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
        	Api.DialogMessage(MainActivity.this, "VUMA registracija", "test test test\r\n\r\nTEST");
            return true;

        default:
            return super.onOptionsItemSelected(item);
        }
    }    
    public void DialogInformation(View view)
    {
    	String message = "Vilniaus universiteto mobilioji aplikacija.\n\n" +
    			"Kûrëjas:\nAurimas Sadauskas\nVilimantas Bernotaitis\nDarius Kriðtapavièius\nDonatas Kurapkis\n" +
    			"Karolis Kleiba\n\nAtnaujinta: 2012-12-08";
    	AlertDialog.Builder builder = new AlertDialog.Builder(view.getContext());
    	builder.setCancelable(true);
    	builder.setIcon(R.drawable.ic_launcher);
    	builder.setTitle("VUMA 1.0");
    	builder.setMessage(message);
    	builder.setInverseBackgroundForced(true);
    	builder.setPositiveButton("Uþdaryti", new DialogInterface.OnClickListener() {
    	  public void onClick(DialogInterface dialog, int which) {
    	    dialog.dismiss();
    	  }
    	});
    	AlertDialog alert = builder.create();
    	alert.show();
    }
}

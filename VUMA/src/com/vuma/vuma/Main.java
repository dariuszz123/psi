package com.vuma.vuma;

import android.os.Bundle;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.Toast;

public class Main extends Activity {

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.activity_main, menu);
        return true;
    }
    public void onClickRssList(View view) {
    	Intent i = new Intent(this, RssList.class);
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
        	Toast.makeText(Main.this, "Preferences is Selecteds", Toast.LENGTH_SHORT).show();
            return true;

        default:
            return super.onOptionsItemSelected(item);
        }
    }    
    
    public void onMyButtonClick(View view)
    {
    	AlertDialog.Builder builder = new AlertDialog.Builder(this);
    	builder.setCancelable(true);
    	builder.setIcon(R.drawable.ic_launcher);
    	builder.setTitle("VUMA Informacija");
    	builder.setMessage("VUMA mobilioji aplikacija.\n Autoriai:\nAurimas Sadauskas\nVilimantas Bernotaitis\nDarius Kriðtapavièius");
    	builder.setInverseBackgroundForced(true);
    	builder.setPositiveButton("Uždaryti", new DialogInterface.OnClickListener() {
    	  public void onClick(DialogInterface dialog, int which) {
    	    dialog.dismiss();
    	  }
    	});
    	AlertDialog alert = builder.create();
    	alert.show();
    }
}
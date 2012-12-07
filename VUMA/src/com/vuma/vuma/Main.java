package com.vuma.vuma;

import android.os.Bundle;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.view.Menu;
import android.view.View;

public class Main extends Activity {

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
    public void onMyButtonClick(View view)
    {
    	AlertDialog.Builder builder = new AlertDialog.Builder(this);
    	builder.setCancelable(true);
    	builder.setIcon(R.drawable.ic_launcher);
    	builder.setTitle("VUMA Informacija");
    	builder.setMessage("VUMA mobilioji aplikacija.\n Autoriai:\nAurimas Sadauskas\nVilimantas Bernotaitis\nDarius Kriðtapavièius");
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

package com.vuma.vuma;

	import android.os.Bundle;
	import android.app.Activity;
	import android.app.AlertDialog;
	import android.content.DialogInterface;
	import android.view.View;

	public class Contacts extends Activity {

	    @Override
	    public void onCreate(Bundle savedInstanceState) {
	        super.onCreate(savedInstanceState);
	        setContentView(R.layout.activity_contacts);
	    }
   
	    public void DialogInformation(View view)
	    {
	    	String message = "Pateikiami kontaktai";
	    	AlertDialog.Builder builder = new AlertDialog.Builder(view.getContext());
	    	builder.setCancelable(true);
	    	builder.setIcon(R.drawable.ic_launcher);
	    	builder.setTitle("VUMA Pagalba");
	    	builder.setMessage(message);
	    	builder.setInverseBackgroundForced(true);
	    	builder.setPositiveButton("U�daryti", new DialogInterface.OnClickListener() {
	    	  public void onClick(DialogInterface dialog, int which) {
	    	    dialog.dismiss();
	    	  }
	    	});
	    	AlertDialog alert = builder.create();
	    	alert.show();
	    }
	    public void onBackPressed(View view) {
			super.onBackPressed();
	    }
	}

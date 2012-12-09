package com.vuma.vuma;

	import android.os.Bundle;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.Toast;
import api.Api;

	public class Schedule extends Activity {

	    @Override
	    public void onCreate(Bundle savedInstanceState) {
	    	String[] faculty = { "Matematikos ir informatikos fakultetas", "Filosofijos fakultetas", "Uþsienio kalbø institutas", "Tarptautinë verslo mokykla",
	    			"Medicinos fakultetas", "TSPMI", "Gamtos mokslø fakultetas", "Fizikos fakultetas", "Chemijos Fakultetas"};
	    	String[] study_program = { "Programø sistemos", "Statistika", "Finansø ir draudimo matematika", "Pedagogika", "Informatika",
	    			"Matematika", "Bioinformatika"};
	    	String[] course = { "I kursas", "II kursas", "III kursas", "IV kursas", "MI kursas", "MII kursas"};
	    	String[] group = { "I grupë", "II grupë", "III grupë", "IV grupë", "V grupë" };
	        super.onCreate(savedInstanceState);
	        setContentView(R.layout.activity_schedule);
		    	Spinner spin_faculty = (Spinner) findViewById(R.id.spinner_fakultetas);
		    	ArrayAdapter<String> sf = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, faculty);
		    	sf.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
				spin_faculty.setAdapter(sf);
				
		    	Spinner spin_sp = (Spinner) findViewById(R.id.spinner_sp);
		    	ArrayAdapter<String> ss = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, study_program);
		    	ss.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
				spin_sp.setAdapter(ss);
				
		    	Spinner spin_course = (Spinner) findViewById(R.id.spinner_kursas);
		    	ArrayAdapter<String> sc = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, course);
		    	sc.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
				spin_course.setAdapter(sc);
				
		    	Spinner spin_group = (Spinner) findViewById(R.id.spinner_grupe);
		    	ArrayAdapter<String> sg = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, group);
		    	sg.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
				spin_group.setAdapter(sg);
	    }
	    public void onClickScheduleShow(View view) {
	    	Intent i = new Intent(this, Schedule_show.class);
	        startActivity(i);
	    }
	    public void DialogInformation(View view)
	    {
	    	String message = "Norint perþiûrëti tvarkaraðtá turite pasirinkti fakulteta, programos dalykà, kursa bei grupæ. Paspaudus mygtuka" +
	    			" rodyti iðvysite tvarkaraðtá.";
	    	AlertDialog.Builder builder = new AlertDialog.Builder(view.getContext());
	    	builder.setCancelable(true);
	    	builder.setIcon(R.drawable.ic_launcher);
	    	builder.setTitle("VUMA Pagalba");
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
	    public void onBackPressed(View view) {
			super.onBackPressed();
	    }
	}

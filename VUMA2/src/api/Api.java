package api;

import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;

import com.vuma.vuma.R;

public class Api {
    public static void DialogMessage(Context context, String title, String message)
    {
    	AlertDialog.Builder builder = new AlertDialog.Builder(context);
    	builder.setCancelable(true);
    	builder.setIcon(R.drawable.ic_launcher);
    	builder.setTitle(title);
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
    
    public static void onBackPressed() {
        // do something on back.
        return;
    }
}

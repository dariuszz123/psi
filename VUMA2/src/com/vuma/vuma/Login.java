package com.vuma.vuma;

import android.os.Bundle;
import android.app.Activity;
import android.view.View;
import android.widget.Toast;

public class Login extends Activity {

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
    }

    public void onLoginButton(View view)
    {
    	Toast.makeText(Login.this, "Try to log in...", Toast.LENGTH_LONG).show();
    }
    public void onBackPressed(View view) {
    		super.onBackPressed();
        return;
    }
}

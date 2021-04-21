package com.bleeeper.ayaxdev;

import android.app.Activity;
import android.os.Bundle;

public class RegistrationActivity extends Activity{

	@Override
	protected void onPause() {
		super.onPause();
		finish();
	}

	@Override
	protected void onCreate(Bundle RegistrationInstance) {
		super.onCreate(RegistrationInstance);
		setContentView(R.layout.registration_activity);
	}
	
	

}

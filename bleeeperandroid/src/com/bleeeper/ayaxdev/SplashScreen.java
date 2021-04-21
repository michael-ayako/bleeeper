package com.bleeeper.ayaxdev;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;

public class SplashScreen extends Activity {

	@Override
	protected void onCreate(Bundle SplashScreenLoad) {
		// TODO Auto-generated method stub
		super.onCreate(SplashScreenLoad);
		setContentView(R.layout.splashscreen);
		Thread countr =new Thread(){
		public void run(){
			try{
				sleep(3000);
			}
			catch(InterruptedException e){
				e.printStackTrace();
			}
			finally{
				Intent SplashScreenLoader = new Intent("com.bleeeper.ayaxdev.MAINACTIVITY");
				startActivity(SplashScreenLoader);
			}
			}
		
		};
		countr.start();
		}

	@Override
	protected void onPause() {
		// TODO Auto-generated method stub
		super.onPause();
		finish();
	}
	
	}



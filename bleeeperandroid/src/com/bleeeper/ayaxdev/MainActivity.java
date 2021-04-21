package com.bleeeper.ayaxdev;

import java.util.ArrayList;
import java.util.List;

import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.ResponseHandler;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.BasicResponseHandler;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.TextView;




public class MainActivity extends Activity{
	
    HttpClient httpclient;
    HttpPost httppost;
    StringBuffer buffer;
    HttpResponse response;
    List<NameValuePair> nameValuePairs;
    
    
    
    @Override
    protected void onCreate(Bundle Login) {
        super.onCreate(Login);
        setContentView(R.layout.activity_main);
        final Button proceed = (Button) findViewById(R.id.submit);
        final Button registerhere = (Button) findViewById(R.id.registerhere);
        final EditText code = (EditText) findViewById(R.id.code);
        final EditText pass = (EditText) findViewById(R.id.pass);
        final TextView loginresponsemsg = (TextView ) findViewById(R.id.loginresponsemsg); 
        final LinearLayout loginlayoutresponsemsg = (LinearLayout) findViewById(R.id.loginlayoutresponsemsg);
        final LinearLayout loginlayoutloadmsg = (LinearLayout) findViewById(R.id.loginlayoutloadmsg);

        

        proceed.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				
				final String retcode = code.getText().toString();
				final String retpass = pass.getText().toString();
				loginlayoutresponsemsg.setVisibility(View.VISIBLE);
			 	if(retcode.contentEquals("") || retpass.contentEquals("")){
			   		
					loginlayoutloadmsg.setVisibility(View.GONE);
					loginlayoutresponsemsg.setVisibility(View.VISIBLE);
					loginresponsemsg.setText("Ensure you fill in all fields");
					

				}else{
					loginlayoutresponsemsg.setVisibility(View.GONE);
					new Thread(new Runnable(){
						public void run(){
							login(retcode,retpass);
						}
					}).start();
					
				}
				
			}
		});
        
        registerhere.setOnClickListener( new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				// TODO Auto-generated method stub
				Intent regscreenload = new Intent("com.bleeeper.ayaxdev.REGSTRATIONACTIVITY");
				startActivity(regscreenload);
			}
		});
      }
    
    
    void login (String code, String pass){
    	final TextView loginresponsemsg = (TextView ) findViewById(R.id.loginresponsemsg); 
        final LinearLayout loginlayoutresponsemsg = (LinearLayout) findViewById(R.id.loginlayoutresponsemsg);
        final LinearLayout loginlayoutloadmsg = (LinearLayout) findViewById(R.id.loginlayoutloadmsg);

    	try{
    	httpclient= new DefaultHttpClient();
    	httppost= new HttpPost(serverconnections.loginurl);
    	
    	nameValuePairs =new ArrayList<NameValuePair>(2);
    	
    	nameValuePairs.add(new BasicNameValuePair("code",code.trim()));
    	nameValuePairs.add(new BasicNameValuePair("password",pass.trim()));
    	
    	httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
    	
    	response=httpclient.execute(httppost);
    	ResponseHandler<String> responsehandler=new BasicResponseHandler();
    	final String response = httpclient.execute(httppost, responsehandler);
    	System.out.println("Response from PHP"+ response);
    	
    	if(response.compareTo("1")==0){
    		loginlayoutloadmsg.setVisibility(View.GONE);
			loginlayoutresponsemsg.setVisibility(View.VISIBLE);
			loginresponsemsg.setText("Ensure you in put the correct credentials");	
    		
    	}else{
    		loginlayoutloadmsg.setVisibility(View.GONE);
			loginlayoutresponsemsg.setVisibility(View.VISIBLE);
			loginresponsemsg.setText("You are in");	
    	}
    	
    	
    	}catch(Exception e){
    		System.out.println("Exception : " + e.getMessage());
    	}
    	}
    	
    	
   }
    

    
    
    


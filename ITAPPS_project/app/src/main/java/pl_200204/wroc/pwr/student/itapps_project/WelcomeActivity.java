package pl_200204.wroc.pwr.student.itapps_project;

import android.content.Intent;
import android.media.Image;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

/**
 * Created by Keczaps on 2016-04-06.
 */
public class WelcomeActivity extends AppCompatActivity {

    Button standard_menu,create_pizza;
    ImageView welcomeIMG;
    int counter = 0, tableNO = 1;
    ShoppingCart shoppingCart = new ShoppingCart();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.welcome_layout);
        standard_menu = (Button) findViewById(R.id.standard_menu);
        create_pizza = (Button) findViewById(R.id.create_pizza);
        welcomeIMG = (ImageView) findViewById(R.id.welcome_img);

        welcomeIMG.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                counter++;
                if(counter == 5){
                    Toast toast = Toast.makeText(getApplicationContext(), "Yes, you've clicked here 5 times. Sorry, this functionality is not available yet.", Toast.LENGTH_SHORT);
                    toast.show();
                    counter = 0;
                }
            }
        });



        standard_menu.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent();

                intent.setClass(getApplicationContext(),FragmentLayout.class);

                startActivity(intent);
            }
        });

        create_pizza.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent();

                intent.setClass(getApplicationContext(),CreateNewPizza.class);

                startActivity(intent);

                //Toast toast = Toast.makeText(getApplicationContext(), "Sorry, this functionality is not available yet.", Toast.LENGTH_SHORT);
                //toast.show();
            }
        });
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String shoppingList = "";
                if(shoppingCart.getShoppingList().isEmpty()) {
                    shoppingList = "Your shopping list is empty.";

                } else {
                    shoppingList = "";
                    for(int i=0;i<shoppingCart.getShoppingList().size();i++) {
                        shoppingList = shoppingList + shoppingCart.getShoppingList().get(i);
                    }}
                Snackbar.make(view, shoppingList, Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_fragment_layout, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
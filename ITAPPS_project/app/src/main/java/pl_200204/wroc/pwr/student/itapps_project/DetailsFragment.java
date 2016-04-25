package pl_200204.wroc.pwr.student.itapps_project;

import android.app.Fragment;
import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Color;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.util.Log;
import android.util.TypedValue;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.ScrollView;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by Keczaps on 2016-04-06.
 */
public class DetailsFragment extends Fragment {

    private ProgressDialog pDialog;

    JSONParser jsonParser = new JSONParser();
    EditText inputName;
    EditText inputPrice;
    EditText inputDesc;

    // url to create new product
    private static String url_create_product = "http://192.168.43.62/itapps/create_product.php";

    // JSON Node names
    private static final String TAG_SUCCESS = "success";

    TextView textViewName, textViewPrice, textViewDesc;
    ShoppingCart shoppingCart = new ShoppingCart();
    Button addToButton;

    public static DetailsFragment newInstance(int index){

        DetailsFragment f = new DetailsFragment();

        Bundle args = new Bundle();
        args.putInt("index",index);

        f.setArguments(args);

        return f;

    }

    public int getShownIndex(){

        return getArguments().getInt("index",0);

    }

    @Nullable
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {

        View view = inflater.inflate(R.layout.details_fragment, container, false);

        textViewName = (TextView) view.findViewById(R.id.textName);
        textViewDesc = (TextView) view.findViewById(R.id.textDesc);
        textViewPrice = (TextView) view.findViewById(R.id.textPrice);
        addToButton = (Button) view.findViewById(R.id.addToCartButt);

        textViewName.setText(MealInfo.NAMES[getShownIndex()]);
        textViewDesc.setText(MealInfo.DESCRIPTION[getShownIndex()]);
        textViewPrice.setText("Price: " + MealInfo.PRICE[getShownIndex()] + " PLN");

        addToButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String name = textViewName.getText().toString();
                String price = textViewPrice.getText().toString().substring(7);
                String description = textViewDesc.getText().toString();

                new CreateNewProduct().execute(name, price, description);

            }
        });


        return view;
    }
    class CreateNewProduct extends AsyncTask<String, String, String> {

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(getActivity());
            pDialog.setMessage("Creating Product..");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(true);
            pDialog.show();
        }

        protected String doInBackground(String... args) {

            List<NameValuePair> params = new ArrayList<NameValuePair>();
            params.add(new BasicNameValuePair("name", args[0]));
            params.add(new BasicNameValuePair("price", args[1]));
            params.add(new BasicNameValuePair("description", args[2]));

            JSONObject json = jsonParser.makeHttpRequest(url_create_product,
                    "POST", params);


            Log.d("Create Response", json.toString());

            return null;
        }

        protected void onPostExecute(String file_url) {
            pDialog.dismiss();
        }

    }
}

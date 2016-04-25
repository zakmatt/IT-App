package pl_200204.wroc.pwr.student.itapps_project;

import android.os.Parcel;
import android.os.Parcelable;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by Keczaps on 2016-04-13.
 */
public class ShoppingCart implements Parcelable {

    private List<String> shoppingList = new ArrayList<>();

    public ShoppingCart(){
    }

    public List<String> getShoppingList() {
        return shoppingList;
    }

    public void setShoppingList(ArrayList<String> shoppingList) {
        this.shoppingList = shoppingList;
    }

    public void addToList(String mealInfo){
        int counter = 0;

        for (int i=0;i<shoppingList.size();i++){
        if(shoppingList.get(i).equals(mealInfo)){
            counter++;
        }
        }
        shoppingList.add(mealInfo);
    }

    public int removeFromList(String mealInfo){
        for(int i=0;i<shoppingList.size();i++){
        if(shoppingList.get(i) == mealInfo){
            shoppingList.remove(i);
        } else {
            return 0;
        }
        }
        return 1;
    }

    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel dest, int flags) {

    }
}

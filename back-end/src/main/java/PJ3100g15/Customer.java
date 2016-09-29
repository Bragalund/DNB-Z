package PJ3100g15;

import java.util.ArrayList;

/**
 * Created by Eva Dahlo on 29/09/2016.
 */
public class Customer extends User {
    private ArrayList<Account> accounts;

    public Customer(){
        accounts = new ArrayList<Account>();
    }

    public boolean addAccount(Account account){
        if (account == null) return false;

        accounts.add(account);
        return  true;
    }


    // Get and set.
    public ArrayList<Account> getAccounts() {
        return accounts;
    }

    public void setAccounts(ArrayList<Account> accounts) {
        this.accounts = accounts;
    }

}

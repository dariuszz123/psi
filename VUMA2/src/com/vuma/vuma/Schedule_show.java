package com.vuma.vuma;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import android.app.ExpandableListActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ExpandableListView;
import android.widget.SimpleExpandableListAdapter;
 
public class Schedule_show extends ExpandableListActivity {
 
    @SuppressWarnings("unchecked")
    public void onCreate(Bundle savedInstanceState) {
        try{
             super.onCreate(savedInstanceState);
             setContentView(R.layout.activity_schedule_show);
 
        SimpleExpandableListAdapter expListAdapter =
            new SimpleExpandableListAdapter(
                    this,
                    createGroupList(),              // Creating group List.
                    R.layout.group_row,             // Group item layout XML.
                    new String[] { "Diena" },  // the key of group item.
                    new int[] { R.id.row_name },    // ID of each group item.-Data under the key goes into this TextView.
                    createChildList(),              // childData describes second-level entries.
                    R.layout.child_row,             // Layout for sub-level entries(second level).
                    new String[] {"Laikas", "Paskaita", "Auditorija"},      // Keys in childData maps to display.
                    new int[] { R.id.grp_childtime, R.id.grp_child, R.id.grp_childclass}     // Data under the keys above go into these TextViews.
                );
            setListAdapter( expListAdapter );       // setting the adapter in the list.
 
        }catch(Exception e){
            System.out.println("Errrr +++ " + e.getMessage());
        }
    }
 
    /* Creating the Hashmap for the row */
    @SuppressWarnings("unchecked")
    private List createGroupList() {
          ArrayList result = new ArrayList();
	            HashMap p = new HashMap();
	            HashMap a = new HashMap();
	            HashMap t = new HashMap();
	            HashMap k = new HashMap();
	            HashMap pp = new HashMap();
		            p.put("Diena","PIRMADIENIS");
		            a.put("Diena","ANTRADIENIS");
		            t.put("Diena","TREČIADIENIS");
		            k.put("Diena","KETVIRTADIENIS");
		            pp.put("Diena","PENKTADIENIS");
            result.add(p);
            result.add(a);
            result.add(t);
            result.add(k);
            result.add(pp);
          return (List)result;
    }
 
    /* creatin the HashMap for the children */
    @SuppressWarnings("unchecked")
    private List createChildList() {
 
        ArrayList result = new ArrayList();
        for( int i = 0 ; i < 4 ; ++i ) { // this -15 is the number of groups(Here it's fifteen)
          /* each group need each HashMap-Here for each group we have 3 subgroups */
          ArrayList secList = new ArrayList();
          for( int n = 0 ; n < 3 ; n++ ) {
            HashMap child = new HashMap();
            child.put("Laikas", "00:00");
            child.put("Paskaita", "Paskaita " + n );
            child.put("Auditorija", "00"+n);
            secList.add( child );
          }
         result.add( secList );
        }
        ArrayList Penktadienis = new ArrayList();
        HashMap Pchild1 = new HashMap();
	          Pchild1.put("Laikas", "08:30 - 10:00");
	          Pchild1.put("Paskaita", "Ekonomikos teorijos pagrindai");
	          Pchild1.put("Auditorija", "304");
	       HashMap Pchild2 = new HashMap();
	          Pchild2.put("Laikas", "10:15 - 12:00");
	          Pchild2.put("Paskaita", "Ekonomikos teorijos pagrindai ");
	          Pchild2.put("Auditorija", "101");
	    Penktadienis.add(Pchild1);
	    Penktadienis.add(Pchild2);
	    result.add( Penktadienis );
        return result;
    }
    public void  onContentChanged  () {
        System.out.println("onContentChanged");
        super.onContentChanged();
    }
    /* This function is called on each child click */
    public boolean onChildClick( ExpandableListView parent, View v, int groupPosition,int childPosition,long id) {
        System.out.println("Inside onChildClick at groupPosition = " + groupPosition +" Child clicked at position " + childPosition);
        return true;
    }
 
    /* This function is called on expansion of the group */
    public void  onGroupExpand  (int groupPosition) {
        try{
             System.out.println("Group exapanding Listener => groupPosition = " + groupPosition);
        }catch(Exception e){
            System.out.println(" groupPosition Errrr +++ " + e.getMessage());
        }
    }
	    public void onBackPressed(View view) {
			super.onBackPressed();
	    }
	}

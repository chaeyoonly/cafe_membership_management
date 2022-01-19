package project_starbucks;

import java.util.Vector;

import javax.swing.table.AbstractTableModel;


public class Membership_Grade extends AbstractTableModel{

	Vector column = new Vector();
	Vector list = new Vector(); 

	public Membership_Grade() {
		column.add("아이디");
		column.add("얼마나사용");
		column.add("회원등급");
	}

 
	public String getColumnName(int index) {
		return String.valueOf(column.get(index));
	}
	
	public void setList(Vector list) {
		this.list = list;
	}

	@Override
	public int getColumnCount() {		
		return column.size(); 
	}

	@Override
	public int getRowCount() {
		
		return list.size(); 
		
	}

	@Override
	public Object getValueAt(int row, int col) {
		Vector vec = (Vector) list.get(row);
		return vec.get(col);
	}
}

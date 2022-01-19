package project_starbucks;

import java.util.Vector;

import javax.swing.table.AbstractTableModel;


public class PersonInfo extends AbstractTableModel{

	Vector column = new Vector();
	Vector list = new Vector(); 

	public PersonInfo() {
		column.add("아이디");
		column.add("이름");
		column.add("주민번호");
		column.add("전화번호");
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

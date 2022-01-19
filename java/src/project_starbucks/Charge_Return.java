package project_starbucks;

import java.util.Vector;

import javax.swing.table.AbstractTableModel;


public class Charge_Return extends AbstractTableModel{

	Vector column = new Vector();
	Vector list = new Vector(); 

	public Charge_Return() {
		column.add("아이디");
		column.add("충전/반환");
		column.add("현금/카드");
		column.add("금액");
		column.add("날짜");
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

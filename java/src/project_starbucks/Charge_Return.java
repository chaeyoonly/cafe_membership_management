package project_starbucks;

import java.util.Vector;

import javax.swing.table.AbstractTableModel;


public class Charge_Return extends AbstractTableModel{

	Vector column = new Vector();
	Vector list = new Vector(); 

	public Charge_Return() {
		column.add("���̵�");
		column.add("����/��ȯ");
		column.add("����/ī��");
		column.add("�ݾ�");
		column.add("��¥");
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

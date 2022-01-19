package project_starbucks;

import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.Container;
import java.awt.FlowLayout;
import java.awt.Font;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Vector;

import javax.swing.JButton;
import javax.swing.JComboBox;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.JTextField;


public class Starbucks_Project extends JFrame implements ActionListener {

	private JPanel panel;
	private JPanel title,person,button,result;	//personinfo
	JPanel card_panel,a_panel,a_button,a_result;	//card
	JPanel inout_panel,i_panel,i_button,i_result;	//inout
	JPanel profitloss_panel,pl_panel,pl_result;	//profitloss

	JPanel tables;
	
	JButton p_insert,p_delete,p_update,p_list;	//personinfo button
	JButton a_insert,a_list,a_back;		//card button
	JButton i_insert,i_delete,i_list;	//inout button
	JButton conclusion,conclusion2;		//profit_loss
	
	JTextField t1,t2,t3,t4;	//personinfo 추가
	JTextField t5,t6,t7,t8;	//card 추가
	JTextField i1,i2,i3,i4;	//inout 추가
	
	JLabel jj1,jj2,jj3,jj4;	//card
	JLabel jj5,jj6,jj7,jj8,jj9,jj10;	//inout
	JComboBox com1,com2;	//inout
	
	JTable jt;	//personinfo table
	JTable at;	//card table
	JTable it;	//in_out table
	JTable pt;	//profit_loss table
	
	String sql,re;
	java.sql.Statement st;
	PreparedStatement p,p2,pp1,pp2;
	Connection con;
	ResultSet resultset,res1,res2;
	
	int index;	//personinfo index
	int index2;	//card index
	int index3;	//inout index
	int index4;	//profitloss index
	
	int uid,balance,amount,card_num;
	
	//----각 class 객체 생성----//
	PersonInfo pf = new PersonInfo();
	Membership_Card ac = new Membership_Card();
	Charge_Return io = new Charge_Return();
	Membership_Grade pl = new Membership_Grade();
	
	
	public Starbucks_Project(){
		
		panel = new JPanel();	//메인패널
		panel.setLayout(new FlowLayout());
		title = new JPanel();	//제목부분 
		title.setBackground(Color.blue);
		person = new JPanel();	//사람정보 입력
		person.setLayout(new GridLayout(4,2,0,0));
		button = new JPanel();	//버튼부분
		button.setLayout(new GridLayout(3,1,0,0));
		result = new JPanel();	//결과물 부분
		result.setLayout(new FlowLayout());
		
		
		////---------제목부분----------////
		JLabel font = new JLabel("♥스타벅스 회원 카드 관리 프로그램♥");
		font.setFont(new Font("HY헤드라인M",Font.CENTER_BASELINE,35));
		font.setForeground(Color.white);
		title.add(font);

		/////-------------------------------------//////
		/////		 PersonInfo 부분!!!			  ///////
		/////-------------------------------------//////
		
		////---------사람정보 입력----------////
		JLabel j1 = new JLabel("User ID");
		JLabel j2 = new JLabel("User NAME");
		JLabel j3 = new JLabel("SSN");
		JLabel j4 = new JLabel("TEL");
		t1 = new JTextField(15);
		t2 = new JTextField(15);
		t3 = new JTextField(15);
		t4 = new JTextField(15);
		
		person.add(j1);
		person.add(t1);
		person.add(j2);
		person.add(t2);
		person.add(j3);
		person.add(t3);
		person.add(j4);
		person.add(t4);
		
		////---------버튼부분----------////
		p_insert = new JButton("추 가");
		p_delete = new JButton("삭 제");
		p_update = new JButton("수 정");
		p_list = new JButton("목 록");
		p_insert.addActionListener(this);
		p_delete.addActionListener(this);
		p_update.addActionListener(this);
		p_list.addActionListener(this);
		
		button.add(p_insert);
		button.add(p_delete);
		button.add(p_update);
		button.add(p_list);
		
		/////-------------------------------------//////
		/////		 member_card    부분!!!	     ///////
		/////-------------------------------------//////
		
		////----------member_card panel부분----------////
		card_panel = new JPanel();
		card_panel.setLayout(new FlowLayout());
		
		a_panel = new JPanel();
		a_panel.setLayout(new GridLayout(4,2,0,0));
		a_button = new JPanel();
		a_button.setLayout(new GridLayout(4,1,0,0));
	
		jj1 = new JLabel("User ID");
		jj2 = new JLabel("카드 번호");
		jj3 = new JLabel("비밀 번호");
		jj4 = new JLabel("카드 잔액");
		t5 = new JTextField(15);
		t6 = new JTextField(15);
		t7 = new JTextField(15);
		t8 = new JTextField(15);
		
		a_panel.add(jj1);
		a_panel.add(t5);
		a_panel.add(jj2);
		a_panel.add(t6);
		a_panel.add(jj3);
		a_panel.add(t7);
		a_panel.add(jj4);
		a_panel.add(t8);
		
		a_insert = new JButton("카드 만들기");
		a_insert.addActionListener(this);
		a_list = new JButton("리스트 불러오기");
		a_list.addActionListener(this);
		a_back = new JButton("돌아가기");
		a_back.addActionListener(this);
		
		a_button.add(a_insert);
		a_button.add(a_list);
		a_button.add(a_back);
		
		card_panel.add(a_panel);
		card_panel.add(a_button);
		card_panel.setVisible(false);		
			
		/////-------------------------------------//////
		/////		 Charge_Return 부분!!!		 ///////
		/////-------------------------------------//////
		
		////----------Charge_Return panel부분----------////
		inout_panel = new JPanel();
		inout_panel.setLayout(new FlowLayout());
		
		i_panel = new JPanel();
		i_panel.setLayout(new GridLayout(6,2,0,0));
		i_button = new JPanel();
		i_button.setLayout(new GridLayout(5,1,0,0));
	
		jj5 = new JLabel("User ID");
		jj9 = new JLabel("Charge/Return");
		com1 = new JComboBox();
		com1.addItem("Charge");
		com1.addItem("Return");
		jj10 = new JLabel("Cash/Card");
		com2 = new JComboBox();
		com2.addItem("Cash");
		com2.addItem("Card");
		jj6 = new JLabel("금액");
		jj7 = new JLabel("날짜");
		i1 = new JTextField(15);
		i2 = new JTextField(15);
		i3 = new JTextField(15);
		
		i_panel.add(jj5);
		i_panel.add(i1);
		i_panel.add(jj9);
		i_panel.add(com1);
		i_panel.add(jj10);
		i_panel.add(com2);
		i_panel.add(jj6);
		i_panel.add(i2);
		i_panel.add(jj7);
		i_panel.add(i3);
		
		
		i_insert = new JButton("카드 충전/반환하기");
		i_insert.addActionListener(this);
		i_delete = new JButton("카드 충전/반환 취소");
		i_delete.addActionListener(this);
		i_list = new JButton("카드 충전/반환 목록");
		i_list.addActionListener(this);
		conclusion = new JButton("회원 카드 정산");
		conclusion.addActionListener(this);
		conclusion2 = new JButton("회원카드 등급 확인");
		conclusion2.addActionListener(this);
		
		i_button.add(i_insert);
		i_button.add(i_delete);
		i_button.add(i_list);
		i_button.add(conclusion);
		i_button.add(conclusion2);
		
		inout_panel.add(i_panel);
		inout_panel.add(i_button);
		inout_panel.setVisible(false);		
		
		/////-------------------------------------//////
		/////		 Member_Grade    부분!!!	  	  ///////
		/////-------------------------------------//////
		
		////----------Member_Grade panel부분----------////
		profitloss_panel = new JPanel();
		profitloss_panel.setLayout(new FlowLayout());
	
		
		/////-------------------------------------//////
		/////		 Table    부분!!!		    	  ///////
		/////-------------------------------------//////
		
		////---------personinfo 결과물부분----------////
		jt = new JTable(pf);
		result.add(jt);
		JScrollPane scroll = new JScrollPane(jt);
		scroll.setSize(17,38);
		result.add(scroll);
		
		////--------Member_Card 결과물부분------////	
		a_result = new JPanel();
		a_result.setLayout(new FlowLayout());
		
		at = new JTable(ac);
		a_result.add(at);
		JScrollPane scroll2 = new JScrollPane(at);
		scroll2.setSize(17,20);
		a_result.add(scroll2);
		
		////--------charge_return 결과물부분------////	
		i_result = new JPanel();
		i_result.setLayout(new FlowLayout());
		
		it = new JTable(io);
		i_result.add(it);
		JScrollPane scroll3 = new JScrollPane(it);
		scroll3.setSize(17,20);
		i_result.add(scroll3);
		i_result.setVisible(false);
		

		////--------Member_Grade 결과물부분------////	
		pl_result = new JPanel();
		pl_result.setLayout(new FlowLayout());
		
		pt = new JTable(pl);
		pl_result.add(pt);
		JScrollPane scroll4 = new JScrollPane(pt);
		scroll4.setSize(17,20);
		pl_result.add(scroll4);
		
		//리스너
		
		jt.addMouseListener(new MouseAdapter() {
			public void mouseClicked(MouseEvent e) {
				index = jt.getSelectedRow();
				
				uid = (int)jt.getValueAt(index, 0);
				String uname = (String)jt.getValueAt(index, 1);
				int ssn = (int)jt.getValueAt(index, 2);
				int tel = (int)jt.getValueAt(index, 3);
				
				t5.setText((Integer.toString(uid)));
				t5.setEditable(false);
				t8.setText("500000");
				t8.setEditable(false);
				
				card_panel.setVisible(true);
				tables.setVisible(true);
				panel.setVisible(false);
			}
		});
		
		at.addMouseListener(new MouseAdapter() {
			public void mouseClicked(MouseEvent e) {
				index2 = at.getSelectedRow();
				
				uid = (int)at.getValueAt(index2, 0);
				card_num= (int)at.getValueAt(index2, 1);
				int password = (int)at.getValueAt(index2, 2);
				balance = (int)at.getValueAt(index2, 3);
				
				
				inout_panel.setVisible(true);
				i_result.setVisible(true);
		}});
		
		it.addMouseListener(new MouseAdapter() {
			public void mouseClicked(MouseEvent e) {
				index3 = it.getSelectedRow();
				
				uid = (int)it.getValueAt(index3, 0);
				String charge_return = (String)it.getValueAt(index3, 1);
				String cash_card = (String)it.getValueAt(index3, 2);
				amount = (int)it.getValueAt(index3, 3);
				String  date = (String)it.getValueAt(index3, 4);
				
		}});
		
		pt.addMouseListener(new MouseAdapter() {
			public void mouseClicked(MouseEvent e) {
				index4 = pt.getSelectedRow();
				
		}});
		
		////---------frame----------////
		tables = new JPanel();
		tables.setLayout(new GridLayout(1,3,0,0));
		tables.add(a_result);
		tables.add(inout_panel);
		tables.add(i_result);
		
		tables.setVisible(false);
		
		
		Container c = getContentPane();
		c.setLayout(new BorderLayout());
		c.add(panel,BorderLayout.CENTER);
		c.add(title,BorderLayout.NORTH);
		c.add(card_panel,BorderLayout.WEST);
		c.add(result,BorderLayout.EAST);
		c.add(tables,BorderLayout.SOUTH);
		
		
		panel.add(person);
		panel.add(button);
		
		setTitle("project_starbucks");
		setSize(1300, 800);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setVisible(true);
		

		
	}

	@Override
	public void actionPerformed(ActionEvent e){
		/////-------------------------------------//////
		/////		 PersonInfo 버튼 이벤트			  ///////
		/////-------------------------------------//////
		if(e.getSource() == p_insert){	//추가
			
			sql = "Insert into PersonInfo(UID,UNAME,SSN,TEL)";
			sql = sql + "Value(?,?,?,?)";	
			
			try {			
				con = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/project_starbucks",
						"root", "apmsetup");	//연결하기
				resultset = null;
				
				p = con.prepareStatement(sql);
				p.setString(1, t1.getText()); 
				p.setString(2, t2.getText());
				p.setString(3, t3.getText());
				p.setString(4, t4.getText());
				
				p.executeUpdate();
			} 
			catch (SQLException ev) 
			{
				System.out.println("SQLException: " + ev.getMessage());
				System.out.println("SQLState: " + ev.getSQLState());
				ev.printStackTrace();
			} 
	
		}
		if(e.getSource() == p_delete){	//삭제
			
			sql = "DELETE from PersonInfo where UID=?";	
			
			try {			
				con = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/project_starbucks",
						"root", "apmsetup");
				resultset = null;
				
				p = con.prepareStatement(sql);
				p.setInt(1, uid);
				p.executeUpdate(); 
				
				this.repaint();
				jt.updateUI();
				}
			catch (SQLException ev) 
			{
				System.out.println("SQLException: " + ev.getMessage());
				System.out.println("SQLState: " + ev.getSQLState());
				ev.printStackTrace();
			} 
		}
		if(e.getSource() == p_update){	//수정
			
			sql = "Update PersonInfo set UNAME=?,SSN=?,TEL=? where UID=?";

			try {			
				con = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/project_starbucks",
						"root", "apmsetup");	//연결하기
				resultset = null;
				
				p = con.prepareStatement(sql);
				p.setString(1, t1.getText()); 
				p.setString(2, t2.getText());
				p.setString(3, t3.getText());
				p.setString(4, t4.getText());
				
				p.executeUpdate();
			} 
			catch (SQLException ev) 
			{
				System.out.println("SQLException: " + ev.getMessage());
				System.out.println("SQLState: " + ev.getSQLState());
				ev.printStackTrace();
			} 
	
		}
		if(e.getSource() == p_list){	//목록보기
			
			String sql = "select * from PersonInfo";
			resultset = null;
			
			try {
				con = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/project_starbucks",
						"root", "apmsetup");	//연결하기
				
				p = con.prepareStatement(sql);
				resultset = p.executeQuery(); 
			
				Vector list2 = new Vector();
				while (resultset.next()) {				
					Vector record2 = new Vector();
					record2.add(resultset.getInt("uid"));
					record2.add(resultset.getString("uname"));
					record2.add(resultset.getInt("ssn"));
					record2.add(resultset.getInt("tel"));
					
					list2.add(record2);
				}
				pf.setList(list2);
				this.repaint();
				jt.updateUI();
				
			} catch (SQLException eve) {
				System.out.println("SQLException: " + eve.getMessage());
				System.out.println("SQLState: " + eve.getSQLState());
				eve.printStackTrace();
			} 
		}
			/////-------------------------------------//////
			/////		 card    버튼 이벤트			  ///////
			/////-------------------------------------//////
		if(e.getSource() == a_insert){	//추가
			
			sql = "Insert into Membership_Card(UID,CARD_NUM,PW,BALANCE)";
			sql = sql + "Value(?,?,?,?)";	
			
			try {			
				con = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/project_starbucks",
						"root", "apmsetup");	//연결하기
				resultset = null;
				
				p = con.prepareStatement(sql);
				p.setString(1, t5.getText()); 
				p.setString(2, t6.getText());
				p.setString(3, t7.getText());
				p.setString(4, t8.getText());
				
				p.executeUpdate();
				//resultset = p.getResultSet();
				
				Vector list2 = new Vector();
				while (resultset.next()) {				
					Vector record2 = new Vector();
					record2.add(resultset.getInt("uid"));
					record2.add(resultset.getInt("card_num"));
					record2.add(resultset.getInt("password"));
					record2.add(resultset.getInt("balance"));
					
					list2.add(record2);
				}
				ac.setList(list2);
				this.repaint();
				at.updateUI();
			} 
			catch (SQLException ev) 
			{
				System.out.println("SQLException: " + ev.getMessage());
				System.out.println("SQLState: " + ev.getSQLState());
				ev.printStackTrace();
			} 
		}
		if(e.getSource() == a_list){	//목록보기
			
			String sql = "select * from Membership_Card";
			resultset = null;
			
			try {
				con = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/project_starbucks",
						"root", "apmsetup");	//연결하기
				
				p = con.prepareStatement(sql);
				resultset = p.executeQuery(); 
			
				Vector list2 = new Vector();
				while (resultset.next()) {				
					Vector record2 = new Vector();
					record2.add(resultset.getInt("uid"));
					record2.add(resultset.getInt("card_num"));
					record2.add(resultset.getInt("pw"));
					record2.add(resultset.getInt("balance"));
					
					list2.add(record2);

				ac.setList(list2);
				this.repaint();
				at.updateUI();
				}
				
			} catch (SQLException eve) {
				System.out.println("SQLException: " + eve.getMessage());
				System.out.println("SQLState: " + eve.getSQLState());
				eve.printStackTrace();
			} 
		}	
		if(e.getSource() == a_back){	//돌아가기
			
			card_panel.setVisible(false);
			tables.setVisible(false);
			panel.setVisible(true);
		}
		/////-------------------------------------//////
		/////		INOUT     버튼 이벤트			  ///////
		/////-------------------------------------//////
		if(e.getSource() == i_insert){	//추가
			
			
			try {			
				
				sql = "Insert into Charge_Return(UID,CHARGE_RETURN,CASH_CARD,AMOUNT,DATE)";
				sql = sql + "Value(?,?,?,?,?)";	
				
				con = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/project_starbucks",
						"root", "apmsetup");	//연결하기
				resultset = null;
				
				p = con.prepareStatement(sql);
				p.setString(1, i1.getText()); 
				p.setString(2, com1.getSelectedItem().toString()); 
				p.setString(3, com2.getSelectedItem().toString()); 
				p.setString(4, i2.getText());
				p.setString(5, i3.getText());
				
				p.executeUpdate();
				
				if(com1.getSelectedItem().toString()=="in"){
					String sql2 = "update Membership_Card set BALANCE = BALANCE+? where UID=?";
					p2 = con.prepareStatement(sql2);
					p2.setInt(1, Integer.parseInt(i2.getText()));
					p2.setInt(2, uid);
					p2.executeUpdate();
					at.updateUI();
				}
				else{
					String sql2 = "update Membership_Card set BALANCE = BALANCE-? where UID=?";
					p2 = con.prepareStatement(sql2);
					p2.setInt(1, Integer.parseInt(i2.getText()));
					p2.setInt(2, uid);
					p2.executeUpdate();
					at.updateUI();
				}
				
			} 
			catch (SQLException ev) 
			{
				System.out.println("SQLException: " + ev.getMessage());
				System.out.println("SQLState: " + ev.getSQLState());
				ev.printStackTrace();
			} 
		}
		if(e.getSource() == i_delete){	//삭제
			
			sql = "DELETE from Charge_Return where UID=?";	
			
			try {			
				con = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/project_starbucks",
						"root", "apmsetup");
				resultset = null;
				
				p = con.prepareStatement(sql);
				p.setInt(1, uid);
				p.executeUpdate(); 
				
				this.repaint();
				it.updateUI();
				}
			catch (SQLException ev) 
			{
				System.out.println("SQLException: " + ev.getMessage());
				System.out.println("SQLState: " + ev.getSQLState());
				ev.printStackTrace();
			} 
			
		}
		if(e.getSource() == i_list){	//목록보기
			
			String sql = "select * from Charge_Return";
			resultset = null;
			
			try {
				con = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/project_starbucks",
						"root", "apmsetup");	//연결하기
				
				p = con.prepareStatement(sql);
				resultset = p.executeQuery(); 
			
				Vector list2 = new Vector();
				while (resultset.next()) {				
					Vector record2 = new Vector();
					record2.add(resultset.getInt("uid"));
					record2.add(resultset.getString("charge_return"));
					record2.add(resultset.getString("cash_card"));
					record2.add(resultset.getInt("amount"));
					record2.add(resultset.getString("date"));
					
					list2.add(record2);

				io.setList(list2);
				this.repaint();
				it.updateUI();
				}
				
			} catch (SQLException eve) {
				System.out.println("SQLException: " + eve.getMessage());
				System.out.println("SQLState: " + eve.getSQLState());
				eve.printStackTrace();
			} 
		}	
		/////-------------------------------------//////
		/////		PROFIT LOSS     버튼 이벤트		  ///////
		/////-------------------------------------//////
		if(e.getSource() == conclusion){	//결산
			try {			
				con = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/project_starbucks",
							"root", "apmsetup");	//연결하기
				
				if(balance<500000) re = "Green";
				else re="Gold";
				
				sql = "Insert into Membership_Grade(UID,HOW_MUCH,GRADE)";
				sql = sql + "Value(?,?,?)";	
				p = con.prepareStatement(sql);
				p.setInt(1, uid); 
				p.setInt(2, balance);
				p.setString(3, re);
				p.executeUpdate(); 
				pt.updateUI();

			
		} 
		catch (SQLException ev) 
		{
			System.out.println("SQLException: " + ev.getMessage());
			System.out.println("SQLState: " + ev.getSQLState());
			ev.printStackTrace();
		} 
			
		}

		if(e.getSource() == conclusion2){	
			conclusion();
		}
	}
	
	public void conclusion(){
		
		String sql = "select * from Membership_Grade";
		resultset = null;
		
		try {
			con = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/project_starbucks",
					"root", "apmsetup");	//연결하기
			
			p = con.prepareStatement(sql);
			resultset = p.executeQuery(); 
		
			Vector list2 = new Vector();
			while (resultset.next()) {				
				Vector record2 = new Vector();
				record2.add(resultset.getInt("uid"));
				record2.add(resultset.getInt("how_much"));
				record2.add(resultset.getString("grade"));
				
				list2.add(record2);

			pl.setList(list2);
			this.repaint();
			pt.updateUI();
			}
			
		} catch (SQLException eve) {
			System.out.println("SQLException: " + eve.getMessage());
			System.out.println("SQLState: " + eve.getSQLState());
			eve.printStackTrace();
		} 
		
		JFrame f = new JFrame("결산");
        f.getContentPane();
        f.setLayout(new GridLayout(1,1));
        JPanel p = new JPanel();
        p.add(pl_result);
        
        f.add(p);
		f.setBounds(300,300,500,120);
        f.setVisible(true);
	}

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		new Starbucks_Project();
	}

}
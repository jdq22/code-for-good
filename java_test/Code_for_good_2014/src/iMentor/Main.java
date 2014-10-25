package iMentor;

import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Iterator;
import java.util.Scanner;

public class Main {
	public static Count allcounts = new Count();
	public final static String [] PRONOUN= {"I","YOU","HIM","HER","ME","US","WE","SHE","HE","IT","THEY","THEM"};
	public final static String [] TEMPORAPHRASE ={"Week", "Weekly","Day","Daily","Year","Yearly","Annually","Quarterly","Time","Date","Morning","Afternoon","Evening","Night",
								"Weekday","Weekdays","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","January","February","March","April","May","June","July","August","September","October","November","December",
								"era","month","past","present","season","term","yesterday","tomorrow"};
	//TODO : this is temp
	public final static String [] TOPIC = {"Growth", "Mindset"};
	
	public static ArrayList<String> sentences = new ArrayList<String>();
	public static ArrayList<Float> sentencesScore = new ArrayList<Float>();
	
	public static void main(String[] args) throws FileNotFoundException {
	    Calculate compare = new Calculate();
		//get input email
		//Create object of FileReader
		try {

			FileReader inputFile = new FileReader("e:/input.txt");
			BufferedReader bufferReader = new BufferedReader(inputFile);
			String wholeEmail = "";
			String line;

			
		    // Read file line by line and print on the console
		    while ((line = bufferReader.readLine()) != null)   {
		    	wholeEmail+=line;
		    }
		    
		    
		    /********************************************/
//			FileReader curriculum_file = new FileReader("e:/input1.txt");
//			BufferedReader bufferReader_curriculum = new BufferedReader(curriculum_file);
//			String wholeCurriculum = "";
//			String line_curriculum;
//		    while ((line_curriculum = bufferReader_curriculum.readLine()) != null)   {
//		    	wholeCurriculum+=line_curriculum;
//		    }
//		    Scanner curriculum_scanner = new Scanner(wholeCurriculum);
//		    curriculum_scanner.useDelimiter("\\.|\\!");
		    
		    /********************************************/
		    
		    //change all words to lower case 
		    wholeEmail.toLowerCase();
		    //Separate based on sentence 
		    Scanner wholeEmail_scanner = new Scanner(wholeEmail);

		    // change the delimiter of this scanner
		    //wholeEmail_scanner.useDelimiter("\\?|\\.|\\!");
		    wholeEmail_scanner.useDelimiter("\\.|\\!");
		    
		    
//		    while(wholeEmail_scanner.hasNext()){
//		    	String temp_sentences=wholeEmail_scanner.next();
//		    	while(curriculum_scanner.hasNext()){
//		    		String temp_curriculum = curriculum_scanner.next();
//		    		Float temp_score = compare.calculateRBFSimilarity(temp_sentences,temp_curriculum);
//		    		System.out.println(temp_score);
//		    		if( temp_score > 0.5){
//		    			sentencesScore.add(temp_score);
//		    		}
//		    	}//end while curriculum
//		    	count(temp_sentences);
//		    	//System.out.println("!!!");
//		    	 //System.out.println(wholeEmail_scanner.next());
////		    	String temp_sentences=wholeEmail_scanner.next();
////		    	sentences.add(temp_sentences);
////		    	 count(temp_sentences);
//		    }
//		    
//		    double sum = 0.0;
//		    Iterator<Float> sentencesScore_iterator = sentencesScore.iterator();
//		    while(sentencesScore_iterator.hasNext()){
//		    	sum+= sentencesScore_iterator.next();
//		    }
//		    System.out.println(sum);
		   
		    while(wholeEmail_scanner.hasNext()){
		    	//System.out.println("!!!");
		    	 //System.out.println(wholeEmail_scanner.next());
		    	String temp_sentences=wholeEmail_scanner.next();
		    	sentences.add(temp_sentences);
		    	 count(temp_sentences);
		    }
		
			System.out.println("questions "+allcounts.getQuestions());
			 System.out.println("pron "+allcounts.getPronouns());
			 System.out.println("temporal " +allcounts.getTemporalPhrase());
	        System.out.println("topic mentions "+allcounts.getTopicMentions());
	        System.out.println("all words "+allcounts.getNumberOfWrods());
		    
		   
		  //Close the buffer reader
		    bufferReader.close();
			
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	private static void count(String next) {
		for (String word: next.split(" ")){
			allcounts.addNumberOfWords();
			if(Arrays.asList(PRONOUN).contains(word)){
				allcounts.addPronouns();
			}
			if(Arrays.asList(TEMPORAPHRASE).contains(word)){
				allcounts.addTemporalPhrase();
			}
			if(word.contains("?")){
				allcounts.addQuestions();
			}
			//TODO
//			if(????.getTopic().contians(word)){
//				allcounts.addTopicMentions();
//			}
			if(Arrays.asList(TOPIC).contains(word)){
				allcounts.addTopicMentions();
			}
			 
	      }//end for

	}
	
	
}

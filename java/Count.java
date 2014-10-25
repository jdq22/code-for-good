package iMentor;

public class Count {
	private static int pronouns;
	private static int questions;
	private static int temporalPhrase;
	private static int topicMentions;
	private static int 	numberOfWords;
	
	public Count(){
		pronouns =0;
		questions =0;
		temporalPhrase =0;
		topicMentions =0;
		numberOfWords=0;
		
	}
	
	//get
	public static int getPronouns(){
		return pronouns;
	}
	
	public static int getQuestions(){
		return questions;
	}
	
	public static int getTemporalPhrase(){
		return temporalPhrase;
	}
	
	public static int getTopicMentions(){
		return topicMentions;
	}
	
	public static int getNumberOfWrods(){
		return numberOfWords;
	}
	
	
	
	//add
	
	public static void addPronouns(){
		pronouns++;
	}
	
	public static void addNumberOfWords(){
		numberOfWords++;
	}
	public static void addQuestions(){
		questions++;
	}
	public static void addTemporalPhrase(){
		temporalPhrase++;
	}
	public static void addTopicMentions(){
		topicMentions++;
	}
	
	
}

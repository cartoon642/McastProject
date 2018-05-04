/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import org.junit.After;
import org.junit.AfterClass;
import static org.junit.Assert.assertEquals;
import static org.junit.Assert.assertFalse;
import static org.junit.Assert.assertTrue;
import org.junit.Before;
import org.junit.BeforeClass;

/**
 *
 * @author a100230
 */
public class Test {
    
    public Test() {
    }
    
    @BeforeClass
    public static void setUpClass() {
    }
    
    @AfterClass
    public static void tearDownClass() {
    }
    
    @Before
    public void setUp() {
    }
    
    @After
    public void tearDown() {
    }

    // TODO add test methods here.
    // The methods must be annotated with annotation @Test. For example:
    //
    // @Test
    // public void hello() {}
    
    @org.junit.Test
    public void testValidate_login_text() {
        System.out.println("validate no empty Strings");
        Login instance = new Login();
        String username  = "meme";
        String password = "";
        boolean result = instance.validate_login_text(username,password);
        assertFalse(result);
}
     @org.junit.Test
    public void testValidate_login() {
        System.out.println("check if username and pass exist");
        String username = "cartoon642";
        String password = "meme123";
        Login instance = new Login();
        boolean result = instance.validate_login_text(username,password);
        assertTrue(result);
}
    @org.junit.Test
    public void SetReviewValidateEpisodes() {
        System.out.println("check that no episodes under 0 enetered");
        int episodes = -1;
        SetReview instance = new SetReview();
        boolean result = instance.checkEpisodes(episodes);
        assertTrue(result);
}
      @org.junit.Test
    public void SetReviewValidatescore() {
        System.out.println("check that score is filled");
        int score = 0;
        SetReview instance = new SetReview();
        boolean result = instance.checkScore(score);
        assertTrue(result);
}
    @org.junit.Test
    public void SetReviewValidateComment() {
        System.out.println("check that comment is under 50 characters");
        String comment = "this message should be longer then 50 characters to check my validation thanks aaaaaaaaaaaaaaaaaaaaaaaaa";
        SetReview instance = new SetReview();
        boolean result = instance.checkcomment(comment);
        assertTrue(result);
}
    
       @org.junit.Test
    public void changeboolean() {
        System.out.println("change the boolean into an int");
        boolean completed = false;
        SetReview instance = new SetReview();
        int result = instance.change_boolean(completed);
        assertEquals(0,result);
}
    @org.junit.Test
    public void checkshows() {
        System.out.println("checks if i already reviewed show");
        String username ="cartoon642";
        String show ="Game of Thrones";
        TVshows instance = new TVshows();
        boolean result = instance.checkshows(username, show);
        assertTrue(result);
}
     @org.junit.Test
    public void EditValidateEpisodes() {
        System.out.println("check that no episodes under 0 enetered");
        int episodes = 10;
        EditReview instance = new EditReview();
        boolean result = instance.checkEpisodes(episodes);
        assertFalse(result);
}
      @org.junit.Test
    public void EditValidatescore() {
        System.out.println("check that score is filled");
        int score = 1;
        EditReview instance = new EditReview();
        boolean result = instance.checkScore(score);
        assertFalse(result);
}
    @org.junit.Test
    public void EditValidateComment() {
        System.out.println("check that comment is under 50 characters");
        String comment = "this message less than 50";
        EditReview instance = new EditReview();
        boolean result = instance.checkcomment(comment);
        assertFalse(result);
}
}

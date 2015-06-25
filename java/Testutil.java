import java.util.*;

public class Testutil
{
    public static void main(String[] args)
    {
        List<String> l1 = new ArrayList<String>();
        l1.add("good");
        l1.add("bad");
        l1.add("shit");
        l1.remove(0);
        System.out.println(l1.get(1));
        System.out.println(l1.size());
        System.out.println(".............\r");
        Test a = new Test();
        a.cup();
        System.out.println(".............\r");
        a.iterator();
        System.out.println(".............\r");
        a.map();
    }
}
 class Test
    {
        public void cup()
        {
            Set<String> s1 = new HashSet<String>();
            s1.add("apple");
            s1.add("b");
            s1.add("banana");
            s1.remove("b");
            System.out.println(s1);
            System.out.println(s1.size());
        }
        public void iterator ()
        {
           List<Integer> l1 = new ArrayList<Integer>();
            l1.add(4);
            l1.add(5);
            l1.add(2);
            Iterator i = l1.iterator();
            while(i.hasNext()) {
                System.out.println(i.next());
            }
        }
        public void map()
        {
           Map<String, Integer> m1 = new HashMap<String, Integer>();
            m1.put("Vamei", 12);
            m1.put("Jerry", 5);
            m1.put("Tom", 18);
            System.out.println(m1.get("Vamei"));
        }
    }

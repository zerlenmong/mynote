import javax.swing.*;
import java.awt.event.*;
import java.awt.*;

public class HelloWorldSwing {
    private static void createAndShowGUI() {
        JFrame frame = new JFrame("HelloWorld");
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

        // Pane's layout
        Container cp = frame.getContentPane();
        cp.setLayout(new FlowLayout());

        // add interactive panel to Content Pane
        cp.add(new ButtonPanel());

        // show the window
        frame.pack();
        frame.setVisible(true);
    }

    public static void main(String[] args) {
        Runnable tr = new Runnable() {
            public void run() {
                createAndShowGUI();
            }
        };
        javax.swing.SwingUtilities.invokeLater(tr);
    }
}

/**
 * JPanel with Event Handling
 */
class ButtonPanel extends JPanel
{
    public ButtonPanel()
    {
        JButton yellowButton = new JButton("Yellow");
        JButton redButton = new JButton("Red");

        this.add(yellowButton);
        this.add(redButton);

        /**
         * register ActionListeners
         */
        ColorAction yellowAction = new ColorAction(Color.yellow);
        ColorAction redAction    = new ColorAction(Color.red);

        yellowButton.addActionListener(yellowAction);
        redButton.addActionListener(redAction);
    }

    /**
     * ActionListener as an inner class
     */
    private class ColorAction implements ActionListener
    {
        public ColorAction(Color c)
        {
            backgroundColor = c;
        }
        /**
         * Actions
         */
        public void actionPerformed(ActionEvent event)
        {
            setBackground(backgroundColor); // outer object, JPanel method
            repaint();
        }

        private Color backgroundColor;
    }
}

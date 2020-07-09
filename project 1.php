<?php
    // Άσκηση 1
    $smartphones = array (  'Huawei Y7 2019' => 149,
                            'Samsung Galaxy A10' => 169,
                            'Xiaomi Redmi Note 8T' => 199,
                            'Apple iPhone 7' => 398);

    // Συναρτηση που παιρνει ενα array και επιστρεφει εναν πινακα με βαση τα δεδομενα του array που δεχεται,
    // καθώς και την χαμηλότερη και υψηλο΄τερη τιμή μέσα από αυτόν τον πίνακα
    function printSmartphones($table) {
        $lowest_price = ''
        $highest_price = ''

        // Αξιολογηση τν τιμων του πινακα και ορισμος της χαληροτερης και υψηλοτερης τιμης του
        foreach($table as $model => $price) {
           if ($lowest_price == '' || $lowest_price < $price) {
               $lowest_price = $price;
           }
           if ($highest_price == '' || $price > $highest_price) {
               $highest_price = $price;
           }
        }

        // Αρχη του HTML αρχειου και του πινακα
        Arxi tou pinaka
        $html = '<!DOCTYPE html><html><body><table style="border: 2px solid blue; border-collapse: collapse">';
        // Εμφανιση των ονοματων των στηλων
        $html .= '<tr><th>Smartphones</th><th>Τιμή(€)</th></tr>';

        // Εμφανιση των σειρων του πινακα
        foreach($table as $model => $price) {
            $html .= '<tr><td>' . $model . '</td><td>' . $price . '</td></tr>';
        }

        // Εμφανιση της χαμηλοτερης και υψηλοτερης τιμης του πινακα
        $html .= '</table><p>Χαμηλότερη Τιμή: ' . $lowest_price . '</p>';
        $html .= '<p>Υψηλότερη τιμή: ' . $highest_price . '</p>';

        // Κλεισιμο των body και html tags  
        $html .= '</body></html>';
        return $html
    }

    // Συναρτηση που παιρνει ενα array και επιστρεφει μια αναδιπλουμενη λιστα με βαση τα δεδομενα του array που δεχεται,
    function smartphoneMenu($table) {
        // Αρχη του HTML 
        $html = '<!DOCTYPE html><html><body><table style="border: 1px solid blue; border-collapse: collapse">';
        // Ετικετα για την αναδιπλουμενη λιστα 
        $html .= '<label for="smartphones">Επιλογή κινητού: </label>';

        // Δημιοθργια της αναδιπλουμενης λιστας
        $html .= '<select id="smartphones">';
        foreach($table as $model => $price) {
            $html .= '<option value="' . $model . '">' . $model . ' (' . $price . '€)</option>';
        }

        // Κλεισιμο της αναδιπλουμενης λιστας 
        $html .= '</select>';
        // Κλεισιμο των body και html tags
        $html .= '</body></html>';
        return $html;
    }

    // Εμφανιση του αποτελεσματος οταν καλουμε την συναρτηση printSmartphones
    echo printSmartphones($smartphones);
    // Εμφανιση του αποτελεσματος οταν καλουμε την συναρτηση smartphoneMenu
    echo smartphoneMenu($smartphones);

    
    
    // Ασκηση 2

    $grades = array( "Grigoriadis Nikolaos" => 5,
                     "Alexiou Maria" =>10,
                     "Papadopoulou Alcmini" => 3,
                     "Alexiou Andreas" => 7);

    // Συναρτηση που παιρνει ενα array και επιστρεφει εναν πινακα με βαση τα δεδομενα του array που δεχεται,
    // χρωματιζοντας με πρασινο τις τιμες που ειναι ισες ή μεγαλυτερες του 5 και με κοκκινο ολες τις υπολοιπες τιμες
    function printGrades(($table) {
        $lowest_price = ''
        $highest_price = ''

        // Αρχη του αρχειου HTML και του πινακα
        $html = '<!DOCTYPE html><html><body><table style="border: 1px solid blue; border-collapse: collapse">';
        // Εμφανιση των ονοματων των στηλων
        $html .= '<tr><th>Ονοματεπώνυμο</th><th>Βαθμός</th></tr>';

        // Εμφανιση των σειρων του πινακα
        foreach($table as $name => $grade) {
            $color = '';
            // Ελεγχει αν η παρουσα τιμη ειναι μεγαλυτερη ή ίση του 5 ή οχι. Αν ναι, τοτε η μεταβλητη color 
            // παρνει την τιμή 'πρασινο', διαφορετικα λαμβανει την τιμη 'κοκκινο' 
            if ($grade >= 5) {
                $colror = 'green';
            }
            else {
                $color = 'red';
            }
            $html .= '<tr><td>' . $name . '</td><td style="color: ' $color . '">' . $grade . '</td></tr>';
        }

        // Κλεισιμο body και html tags
        $html .= '</body></html>';
        return $html
    }

    // Προσθηκη δυο φοιτητων στη λιστα με τους υπολοιπους φοιτητες
    $grades += array('Vasilis Anastasiadis' => 10);
    $grades += array('Giwrgos Papadopoulos' => 2);

    // Εμφανιση του πινακα με τους φοιτητες και τους βαθμους τους
    echo "Grades table after adding students\n";
    echo printGrades($grades);

    // Αφαιρεση του τελευταιου στοιχειου του array και εμφανιση του πινακα
    array_pop($grades);
    echo "Grades table after deleting students\n";
    echo printGrades($grades);

    // Ταξινομηση των στοιχειων του πινακα αυξουσα αλφαβητικα με βαση τα ονοματα των φοιτητων στη λιστα και εμφανιση του πινακα
    ksort($grades);
    echo "Grades table in ascending alphabetical students' name order\n";
    echo printGrades($grades);

    // Ταξινομηση των στοιχειων του πινακα βασει της βαθμολογιας κατα φθινουσα διαταξη και εμφανιση του πινακα 
    arsort($grades);
    echo "Grades table in descending order based on sudents' grade";
    echo printGrades($grades);

    // Συναρτηση που πραγματοποιει αναζητηση ενος ονοματος στον πινακα και εμφανιζει τον βαθμο σε περιπτωση που ενας φοιτητης
    // με το ονομα αυτο υπαρχει μεσα στον πινακα, διαφορετικα μας ενημερωνει πως ο φοιτητης δεν βρεθηκε στα στοιχεια του πινακα
    function search($table, $name) {
        foreach($table as $studentName => $grade) {
            if (array_key_exists($name, $table)) {
                return 'Ο βαθμος του φοιτητη που αναζητησατε ειναι ' . $grade;
            }
        }
        return 'Ο φοιτητης που αναζητειται δεν παρεβρεθηκε στις εξετασεις'
    }

    $student1 = 'Georgiou Nikos';
    $student2 = 'Alexiou Andreas';
    
    echo 'Search results for ' . $student1;
    echo search($grades, $student1);
    echo 'Search results for ' . $student2;
    echo serch($grades, $student2);



    // Ασκηση 3
    
    $employees = array(
        array(
        "name" => "Nikolaou Nikolaos",
        "occupation" => "Employee",
        "salary" => 1500,
        "specialty" => "Web Programmer"
        ),
        array(
        "name" => "Papadopoulou Anna",
        "occupation" => "Manager",
        "salary" => 2300,
        "specialty" => "Human resources management"
        ),
        array(
        "name" => "Alexiou Nikoleta",
        "occupation" => "Employee",
        "salary" => 800,
        "specialty" => "Secretary"
        ),
    );

    // Συναρτηση που διασχιζει και εμφανιζει τα στοιχεια του πινακα που δεχεται
    function printTable($table) {
        // Αρχη του αρχειου HTML και των λιστων των στοιχειων του καθε υπαλληλου
        $html = '<!DOCTYPE html><html><body><h1 style="color: red;">Employees and managers</h1>';
        
        // Εμφανιση των στοιχειων του καθε εργαζομενου
        for ($i = 0, $len = count($table); $i < $len; $i++) {
            $html .= '<h3 style="color: blue;">Employee #' . ($i + 1) . '</h3><ul>';
            foreach ($table[i] as $key => $value) {
                // Προσθηκη των στοιχειων του εργαζομενου ως ξεχωριστη γραμμη στη λιστα
                $html .= '<li>' . $key . ': ' . $value;
            }

            // Κλεισιμο της λιστας
            $html .= '</ul>';
        }

        // Κλεισιμο των body και html tags
        $html .= '</body></html>';
        return $html;
    }
    // Εμφανιση των εργαζομενων
    echo printTable($);
?>
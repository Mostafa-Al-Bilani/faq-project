
<?php
require("../connection/connection.php");


// sql to create table
$hash1 = password_hash("12345678", PASSWORD_DEFAULT);
$hash2 = password_hash("56789012", PASSWORD_DEFAULT);
$hash3 = password_hash("78923455", PASSWORD_DEFAULT);
$sqlUser = "INSERT INTO `users` (fullname, email, password) VALUES
('mostafa Bilani', 'mostafa.mb@hotmail.com', '$hash1'),
('mohamad makdah', 'mak@hotmail.com', '$hash2'),
('ehab maatouk', 'ehab@hotmail.com', '$hash3')";


$query = $mysqli->prepare($sqlUser);
$query->execute();

$sqlQuest = "INSERT INTO `questions` (question, answer) VALUES
('What is reasoning in AI models?', 'AI reasoning refers to the ability of a model to process information, draw logical conclusions, and solve problems systematically. It involves techniques such as multi-hop reasoning, logical deduction, and algorithmic thinking.'),
('How do AI models handle complex questions?', 'AI models break down complex questions into smaller, manageable parts using Decompositional Reasoning (DC). This approach allows the model to tackle each step individually and combine results for an accurate answer.'),
('What is multi-hop reasoning?', 'Multi-hop reasoning is the process where an AI model gathers and connects information from multiple sources before answering a question. This is essential for complex queries that require linking different pieces of information.'),
('What is the role of logical deduction in AI?', 'Logical deduction helps AI models analyze relationships between data points, follow step-by-step reasoning, and make conclusions based on given conditions. This is commonly used in mathematics, programming, and structured problem-solving.'),
('What are the most common reasoning patterns in AI?', 'Two of the most frequently used reasoning patterns in AI are Decompositional Reasoning (DC) for breaking down problems and Sequential Reasoning (SR) for following logical steps in order.'),
('How do AI models answer questions based on multiple documents?', 'They extract key ideas, organize information into structured categories, and use reasoning patterns like multi-hop reasoning to connect different pieces of data and provide an accurate response.'),
('How do AI models ensure they follow constraints in text generation?', 'AI models use Explicit Constraint Handling (EC) to ensure that generated text adheres to specific rules, such as avoiding certain words or maintaining a particular structure.'),
('What is Sequential Reasoning in AI text generation?', 'Sequential Reasoning (SR) helps AI maintain logical flow in generated content by ensuring that ideas are connected and the output remains coherent.'),
('Can AI solve mathematical problems?', 'Yes, AI models can solve complex mathematical problems by applying Mathematical Reasoning (MR), which involves analyzing equations, identifying patterns, and systematically applying formulas.'),
('How does AI analyze numerical data?', 'AI uses Statistical Analysis (SA) to interpret numerical data, detect trends, and make predictions based on statistical patterns.'),
('How is AI used in competitive mathematics exams?', 'AI models approach mathematical challenges by breaking them into smaller steps, analyzing constraints, applying formulas, and constructing logical solutions. This method is useful for exams like AIME (American Invitational Mathematics Examination).'),
('How does AI handle programming challenges?', 'For programming tasks, AI defines variables, structures data, applies algorithms, and uses loops or recursion to find optimal solutions. This process is similar to how students tackle problems in coding competitions like USACO (USA Computing Olympiad).'),
('Why is Decompositional Reasoning important in programming?', 'Decompositional Reasoning (DC) allows AI to break down a complex coding problem into smaller steps, making it easier to debug, optimize, and implement solutions efficiently.'),
('What types of algorithms does AI use in problem-solving?', 'AI relies on various algorithms such as recursion, dynamic programming, and graph traversal to efficiently solve computational problems.'),
('How does AI optimize code for efficiency?', 'AI evaluates different possible solutions, analyzes execution time, and applies optimization techniques to ensure that the code runs efficiently without unnecessary computations.'),
('What are reasoning tokens, and why do they matter?', 'Reasoning tokens represent the number of steps or logical operations an AI model performs to reach a conclusion. A higher number of reasoning tokens usually indicates a more complex thought process.'),
('Which tasks require the most reasoning steps in AI?', 'Tasks that involve multi-hop reasoning, such as answering complex questions across multiple documents, require the most reasoning steps due to the need for deeper analysis and information retrieval.'),
('How does AI handle constraints differently in various tasks?', 'In mathematical and programming challenges, AI follows strict logical and numerical constraints, while in text generation, it adheres to stylistic or structural rules.'),
('What are some key areas where AI reasoning can be improved?', 'AI reasoning can be enhanced by improving its ability to handle ambiguous questions, better interpret numerical data, and refine multi-hop reasoning for more accurate information retrieval.'),
('How can AI reasoning insights contribute to future research?', 'By analyzing AI reasoning patterns, researchers can develop more efficient models, refine logical structures, and create AI systems that can tackle even more complex real-world problems.')
";

$query = $mysqli->prepare($sqlQuest);
$query->execute();
?>

## Introduction to Datamining
---

Slides of this chapter:
- [Projektwerk - Introduction to Datamining](https://projektwerk.ucll.be/projects/ba_minor/repository/sub-ti-repo/raw/01_2_introduction_datamining.pdf)

---

### Background on data mining

What is Data mining?
- Phrase on CV
- Extraction of implicit, previously unknown and useful information from data
- Buzzword (for funding/investment)
- Analysis of large dataset to discover meaningful patterns

> The process of automatically identifying models and patterns from massive observational databases that are:

- **Valid**: New data with certainty
- **Novel**: Non-obvious to the system
- **Useful**: Should have a use-case
- **Understandable**: Humans intepret the patterns

> The process of automatically identifying models and patterns from massive observational databases

#### Three goals of Data Mining

1. Understanding the data
2. Extracting knowledge from the data
3. Make predictions about the future


#### Why is data popular now?

1. **Possible**: Technology has improved
2. **Needed**: Now everyone has data
3. Storage is less costly
4. Improvements in computing power
5. Improvements in ML


#### Motivation for Data Mining

- Information can be 'hidden' in other data
    - Human analysts take too long
    - Or it is never analysed

- It helps to:
    - Classifying and segmenting data
    - Form hypotheses
    - Find hidden correlations

---


#### Data Mining vs Statistics

- Traditional statistics
    - Hypothesize &rarr; collect data &rarr; analyze
    - Model oriented
- Data mining
    - No hypothesis
    - Data driven analysis of existing data
    - ALgorithms vs models

---

#### Data Mining vs Machine learning

- Data mining focus on
    - Scalability
    - Applications
    - Industrial setting
- ML
    - More theoretica
    - Research/Academia

---

### Data Mining Challenges


- Scalability
- Dimensionality
- Retrospective data
- Data quality
- Privacy

#### Curse of Dimensionality

> Imagine instances are described by 1000 attributes, but only two are relevant to the concept

- Curse of Dimensionality
    - Too many features &rarr; spurious correlations
    - Nearest neighbors easily misleading in high dimension
    - Easy problems in low dimension &rarr; hard in high dimension
    - Low dimension intuition doesn't apply in high dimension


#### Spurious Correlations

- Discovering meaningless patterns
- **Bonferroni's princible**
    - > (roughly) if you look in more places for interesting patterns than your amount of data will support, you are bound to find crap
- More variables &rarr; higher chance of correlation by chance

---
#### Retrospective Data

Two types:
- Experimental data
    - Develop hypothesis H
    - Design experiment, with controls, to test H
    - Collect data
    - &rarr; analyze results to see if they confirm H
- Observational data
    - Huge observational data sets
        - Eg: web logs, customer transactions,..
    - Use available data
        - Useful information
        - Cheap to collect

**Retrospective data**
- Use observational data for science

---
#### Complex and Heterogeneous Data

- Complex data
    - Structured
        - Dependencies between tables
        - Dependencies between rows in table
    - Semi-structured
        - Structured information
        - Free text
    - Unstructured
        - Large text, no structure

- Heterogeneous Data
    - Data are different
        - Different db schemas
        - Different terminology for concepts
        - Different data formats
        - Full name vs. nickname
    - &rarr; complicated problems
        - Schema matching
        - Ontology matching
        - Entity resolution

---
#### Data quality

- Date missing or incomplete
    - Optional fields
    - Intentionally misleading information
- Inexact measurements
    - Search result satisfaction? &rarr; Hard to measure
    - Add optimization? &rarr; Would other user have clicked it?
- Data bias
---

#### Data Ownership

> Data is valuable and people and companies often not interested in sharing

Data can also be (legally) protected

#### Privacy Issues

- Privacy breaches
- How to make data non identifiable?

#### Streaming Data

- Non static data
    - Stock price
    - News
    - Sensors
- Too much data
    - What do we store?
    - How can we use it?

---


### Data Mining Tasks


- **Exploratory analysis**
    - First step
        - Inspect data
        - Get a sense for:
            - Possible challenges
            - Possibilities
    - What to look for?
        - Look at simple statistics of:
            - Number of variables
            - Data size
            - Missing values
            - Skew
    - For each attribute look at:
        - Discrete:
            - Number of possible values
            - Ordering
            - Frequency
            - Numeric
                - mean, min, max,...
- **Descriptive modeling**
    - Build model that can:
        - Describe/summarize the data
        - Simulate the data
        - Model the process of data generations
    - Techniques:
        - Clustering
        - Probability estimation
- **Predictive modeling**
    - Classification
    - Regression
- **Patterny discovery**
    - Association detection
    - Trend & deviation detectoin

- Example
    - Items co-purchased in a shop
        - Associations:
            - {Cheese,W} &rarr; {Bread},
            - with confidence = 0.75

---


### Data Mining vs Machine learning

#### Instance-Based Learning

- Learning &asymp; memoerize training examples
    - Find most similar example
        - Classification: output it's category
        - Regression: output it's value

**Decision trees**

---


### The data mining process

*Data* &rarr; **Selection** &rarr; *Target data* &rarr; **Preprocessing** &rarr; *Preprocessed data* &rarr; **Data Mining** &rarr; *Patterns* &rarr; **Interpret/Evaluate** &rarr; *Knowledge*


#### Requirements for data mining system

- Computationally sound
    - Scalability time & space complexity
    - Parallelizable
- Statistically sound
    - Are patterns meaningful?
    - Do results generalize to new data
- Ergonomically sound
    - Present results in comprehensible manner


#### Evaluation

- Objective
    - Accuracy
    - Cost/Utility
    - Speed
    - Etc
- Subjective
    - Interesting
    - Novel
    - Actionable
    - Etc

---

### Summary

- We live an age where large amounts of data are commonplace
- Data mining is very popular (provides useful information)

---
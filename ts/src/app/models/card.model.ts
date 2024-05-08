import { answers } from "./answers.model";

export interface card{
    title: string;
    author: string;
    question: string;
    like: number;
    questions: answers[]
    isExpanded: boolean;
}